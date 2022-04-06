<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
	User,
	Thread,
	Channel
};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Http\Requests\ThreadRequest;
use App\Http\Requests\ThreadRequestUpdate;


class ThreadController extends Controller
{
	private $thread;

	public function __construct(Thread $thread)
	{
		$this->thread = $thread;
	}

    public function index(Request $request, Channel $channel)
    {
//	    if(!Gate::allows('access-index-thread')) {
//	    	return dd('Não tenho permissão!');
//	    }

    	$channelParam = $request->channel;

    	if(null !== $channelParam) {
    		$threads = $channel->whereSlug($channelParam)->first()->threads()->paginate(15); // canal com filtro
		} else {
		    $threads = $this->thread->orderBy('created_at', 'DESC')->paginate(15); // canais gerais
		}

        return view('threads.index', compact('threads'));
    }

    public function create(Channel $channel)
    {
	    return view('threads.create', [
	    	'channels' => $channel->all()
	    ]);
    }

    public function store(ThreadRequest $request)
    {
        try{
            // dd($thread = $request->all());
        	$thread = $request->all();
        	$thread['slug'] = Str::slug($thread['title']);
            $currentuser = $thread['user_id'][0];

        	$user = User::find($currentuser);
			$thread = $user->threads()->create($thread);

			flash('Tópico criado com sucesso!')->success();
			return redirect()->route('threads.show', $thread->slug);

        } catch (\Exception $e) {
        	$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição!';

	        flash($message)->warning();
        	return redirect()->back();
        }
    }

    public function show($thread)
    {
	    $thread = $this->thread->whereSlug($thread)->first();

	    if(!$thread) return redirect()->route('threads.index');

	    return view('threads.show', compact('thread'));
    }

    public function edit($thread)
    {
        // dd($thread);
    	$thread = $this->thread->whereSlug($thread)->first();

    	$this->authorize('update', $thread); // referência em Policies

	    return view('threads.edit', compact('thread'));
    }

    public function update(ThreadRequestUpdate $request, $threads) //validação da request estava travando a função
    {
        // dd($threads);
	    try{
		    $thread = $this->thread->whereSlug($threads)->first();
		    $thread->update($request->all());

		    flash('Tópico atualizado com sucesso!')->success();
		    return redirect()->route('threads.index', $thread->slug);

	    } catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição!';

	        flash($message)->warning();
        	return redirect()->back();
	    }
    }

    public function destroy($thread)
    {
	    try{
		    $thread = $this->thread->whereSlug($thread)->first();
		    $thread->delete();

		    flash('Tópico removido com sucesso!')->success();
			return redirect()->route('threads.index');

	    } catch (\Exception $e) {
		    $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição!';

	        flash($message)->warning();
        	return redirect()->back();
	    }
    }
}
