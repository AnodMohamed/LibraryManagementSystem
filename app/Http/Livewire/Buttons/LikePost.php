<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikePost extends Component
{
    public $post_id;
    public Post $post;

    public function mount()
    {
        $this->post_id = $this->post->getAttribute('id');
    }
    public function like()
    {
        $like  = new Like();
        $like->post_id =$this->post_id;
        $like->user_id =Auth::user()->id;
        $like->save();
        return redirect()->route('blog');
    }
    public function render()
    {
        return view('livewire.buttons.like-post');
    }
}
