$(document).ready(function(){

  $(function() {
   $('.cart-list .cart-img').hover(
    function(){
      $(this).stop().animate({
        'width':'220px',
        'height':'120px',
        'marginTop':'0px',
        'marginLeft':'0px',
        'marginRight':'0px'
      },100);
    },
    function () {
      $(this).stop().animate({
        'width':'200px',
        'height':'103px',
        'marginTop':'0px',
        'marginLeft':'0px',
        'marginRight':'0px'
      },200);
    }
    );
 });

  // $(".cart-thumb").on('click',function(){
  //   setTimeout('rect()');
  // });

  setTimeout('rect2()'); //アニメーションを実行
});

$('input[type=file]').change(function(){
  // 選択されたファイル名を取得するお決まりのやりかた
  var file=$(this).prop('files')[0];

  if(!file.type.match('image.*')){
    $(this).var('');
    $('.cms-thumb > img').html('');
    return;
  }

  var reader=new FileReader();
  reader.onload=function(){
    $('.cms-thumb > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
});

function rect() {
    $('.cart-thumb').animate({
        marginTop: '-=10px'
    }, 800).animate({
        marginTop: '+=10px'
    }, 800);
    setTimeout('rect()', 1600); //アニメーションを繰り返す間隔
}

function rect2() {
    $("img.thumb").animate({
        left: "1150px" //要素を動かす位置
    }, 20000).animate({
        left: "-50px"　//要素を戻す位置
    }, 0)
    setTimeout("rect2()", 3000);//アニメーションを繰り返す間隔
}
