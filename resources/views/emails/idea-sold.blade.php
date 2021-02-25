<h3>
  商品が売れました
</h3>

<p>
  {{$idea->user->name}} 様<br>
  このメールはInspirationから自動で送信しています。
</p>
<p>
  商品名:{{$idea->title}}
</p>
<p>
  商品が売れました<br>
  ログインして確認しましょう
</p>

<a href="{{ route('login')}}">Inspiration</a>


<p>
----------------------------</br>
 Inspiration　Helpdesk</br>
 システムに関するお問い合わせ</br>
 フリーダイヤル　0120-xxxx-xxx</br>
 info@inspiration-o.com</br>
</p>