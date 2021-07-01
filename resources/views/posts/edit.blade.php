<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                display: flex;
                justify-content:center;
                align-items: center;
                width: 80%;
            }
            .title{
                width:100%;
            }
            .content{
                width:100%;
                height: 20rem;
            }
        </style>
    </head>
    <body class="antialiased">
      <div>
      <h1>Post edit</h1>
      <form action="" method="get" onsubmit="">
            <label for="title">제목</label>
            <input class="title" type="text" name="제목" id="title">
            <label for="content">내용</label>
            <textarea  class="content" name="내용" id="content" cols="30" rows="10"></textarea>
        <input type="button" value="제출">
      </form>
      </div>
    </body>
</html>
