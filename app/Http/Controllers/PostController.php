<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//classe de autenticação
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Metodo esponsavel por listar todos os posts
    public function index()
    {
        $posts = Post::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(3);//asc para do mais velho ao mais novo

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Metodo responsavel por criar os ports
    public function create()
    {
        return view('posts.create');//redireiona para a view de criação de post
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //metodo responsavel por cadastrar no banco
    public function store(Request $request)
    {

        //Fazemos a validação dos campos de titulo e corpo da postagem
     $validatedData = $request ->validate([
         'title' => ['required','unique:posts','max:255'],//obrigatorio,valor unico e tem que possuir no maximo, 255 caracteres
         'body' => ['required'],//obrigatorio
     ]);

        $post = new Post( $validatedData);///criamos após a validação

        $post->user_id = Auth::id();//identificamos o autor
        $post->save();//salvamos
        return redirect('posts')->with('success', 'Post criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     //metodo responsavel por vi os dados
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     //rota para mostrar em um form, as informações que precisam ser editadas 
    public function edit(Post $post)
    {
        if($post->user_id===Auth::id()){

        return view('posts.edith', compact('post'));
        }
        else{
            return redirect()->route('posts.index')
                                     ->with('error', 'você não autorização para editar esta publicação. por favor, vá dormi')
                                     ->withInput();
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     //rota para atualizar as informações do form de edição
    public function update(Request $request, Post $post)
    {

        $validatedData = $request->validate([
            'title' => ['required',Rule::unique('posts')->ignore($post),'max:255'],//obrigatorio,valor unico e tem que possuir no maximo, 255 caracteres
            'body' => ['required'],//obrigatorio
   
        ]);
        if($post->user_id===Auth::id()){
            $post->update($request->all());
            return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso');
        }
        else{
            return redirect()->route('posts.index')
                                     ->with('error', 'você não autorização para editar esta publicação. por favor, vá dormi')
                                     ->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->user_id===Auth::id()){
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deletado com sucesso');
        }
        else{
            return redirect()->route('posts.index')
                                     ->with('error', 'você não autorização para deletar esta publicação. por favor, vá dormi')
                                     ->withInput();
        }


    }
}
