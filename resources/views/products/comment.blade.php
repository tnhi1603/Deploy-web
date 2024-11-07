<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/comment.css">
    <script src="https://kit.fontawesome.com/9e1c1de695.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The UITERs - Home </title>
</head>

<body>
    <section id="comment">
        <div class="comment-heading">
            <span>Comment</span>
        </div>
    </section>
    <!------>
    @foreach ($post as $p)
    <div class="comment-box-comment">
        <!------>
        <div class="comment-box">

            <div class="box-top">
                <div class="profile">
                    <div class="profile-img">
                        <img src="/public/img/OIP.jpeg">
                    </div>

                    <div class="name-user">
                        <strong>{{$p->user->name}}</strong>
                        <span>{{"@" . $p->user->id}}</span>
                    </div>
                </div>
                <div class="review">
                    @for ($i = 0; $i < $p->star; $i++)
                    <i class="fas fa-star"></i>
                    @endfor
                </div>
            </div>
            <div class="client-comment">
                <p>{{$p->message}}
                </p>
            </div>
        </div>
    </div>
    @endforeach



    
</body>

</html>