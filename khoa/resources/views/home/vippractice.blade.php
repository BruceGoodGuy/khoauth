@extends("template.indexTemplate")
@section('content')
@include("module.headerWord")
<div id="coverAll">
   <div id="iContain">
      <div class="headervip">
         Bài tập từ vựng VIP
      </div>
      @foreach($array as $key => $array)
      <div class="imagevip" word="{{$array['word']}}" kq={{$array['hihi']}} pos="{{$key}}" @if($key!=0) style="display:none" @endif>
      <img src="{{asset('/')}}public/image/imageWord/newWord/{{$array['image']}}">
      <div class="showhint">
         <div class="divhidden">
            <form>
               <input type="hidden" name="_token()" value="{{csrf_token()}}">
               @foreach($array['hidden'] as $k => $hidden)
               @if($hidden != '_')
               <span>{{$hidden}}</span>
               @endif
               @if($hidden == '_')
               <input  type="text" maxlength="1" size="1" name="key{{$k}}" class="input-text input">
               @endif
               @endforeach
            </form>
         </div>
         <div class="showAnswer">
            <p class="hiAnswer">{{$array['word']}}</p>
            - 
            {{$array['mean']}}</br>
            {{$array['type']}} - /{{$array['pronun']}}/</br>
            Ví dụ: 
            {{$array['exEng']}}
            </br>
            {{$array['exVie']}}
         </div>
         <div class="moreinfo">
            {{$array['type']}} - /{{$array['pronun']}}/
         </div>
      </div>
   </div>
   @endforeach
   <div class="showcontrol">
      <span class="box back">
      Back
      </span>
      <span class="box lose">
      Show
      </span>
      <span class="box check">
      Check
      </span>
      <span class="box easy">
      Next
      </span>
   </div>
</div>
</div>
<script>
   $(document).ready(function(){
       var total=-1;
       $('.imagevip').each(function(){
           total++;
       });
       $('.back').click(function(){
           $('.showAnswer').hide();
            $('.moreinfo').show();
          $('.imagevip').each(function(){
               if($(this).is(':visible'))
                   {
                       pos = $(this).attr('pos');
                       if(pos==0)
                         pos=total;
                       else
                         pos--;
                   }
           });
           $('.imagevip').hide();
           $('.imagevip').each(function(){
               if($(this).attr('pos')==pos)
               {
                   $(this).fadeIn();
               }
           });
       });
       $('.lose').click(function(){
           $('.showAnswer').fadeToggle();
           $('.moreinfo').slideToggle();
       })
       var pos;
       $('.easy').click(function(){
            $('.showAnswer').hide();
             $('.moreinfo').show();
           $('.imagevip').each(function(){
               if($(this).is(':visible'))
                   {
                       pos = $(this).attr('pos');
                       if(pos<total)
                         pos++;
                       else
                         pos = 0;
                   }
           });
           $('.imagevip').hide();
           $('.imagevip').each(function(){
               if($(this).attr('pos')==pos)
               {
                   $(this).fadeIn();
               }
           });
       });
       var a;
       $('.check').click(function(){
           var b = '';
           var c="";
          $('.imagevip').each(function(){
              if($(this).is(':visible'))
                   {
                        a = $(this).attr('word');
                        c = $(this).attr('kq');
                   }
          });
          $('.input').each(function(){
              if($(this).is(":visible"))
              {
                 b +=$(this).val().toLowerCase();
              }
          }) 
          if(b==c)
          {
              alert('Đúng rồi');
          }             
          else
           alert("Sai rồi")
       });
   });
</script>
@endsection