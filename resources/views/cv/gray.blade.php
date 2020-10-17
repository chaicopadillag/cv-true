<!DOCTYPE html>
<html lang="es">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>{{config('app.name')}} | {{$usuario->name}} {{$usuario->apellidos}}</title>
   <meta name="viewport" content="initial-scale=1.0,width=device-width" />
   <link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
   <link rel="stylesheet" href="{{ asset('cv/css/gray/style.css') }}" type="text/css" media="all" />
   <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}" media="all">
</head>

<body>
   <div id="sticker"></div>
   <div id="wrapper">
      <h2 id="titleName" class="sectionHead">
         {{$usuario->name.' '}}{{($usuario->apellidos==null) ? abort(403,'Permiso denegado, datos de perfil incompletos'):$usuario->apellidos}}
      </h2>
      <div id="bio">
         <h2 style="padding-left: 20px">{{$usuario->especialidad}}</h2>
         <div id="socialIcons">
            <a class="socialIcon fa fa-globe" target="_blank" id="dribbbleIcon" href="{{$contactos->pagina_web}}"></a>
            <a class="socialIcon fab fa-facebook" target="_blank" id="facebookIcon" href="{{$contactos->facebook}}"></a>
            <a class="socialIcon fab fa-twitter" target="_blank" id="twitterIcon" href="{{$contactos->twitter}}"></a>
            <a class="socialIcon fab fa-instagram" target="_blank" id="gplusIcon" href="{{$contactos->instagram}}"></a>
            <a class="socialIcon fab fa-github" target="_blank" id="gplusIcon" href="{{$contactos->instagram}}"></a>

         </div>
         <p>{{$usuario->resumen}}</p>
      </div>
      <div class="clear"></div>
      <h2 id="tools" class="sectionHead"> <i class="fa fa-shield-alt"></i> MIS HABILIDADES</h2>
      <ul id="skills">
         @foreach ($habilidades as $habilidad)
         <li id="skill1" style="width:{{$habilidad->nivel}}%;" data-valor="{{$habilidad->nivel}}%">
            <span>{{$habilidad->habilidad}}</span></li>
         @endforeach
      </ul>
      <div class="clear"></div>
      <h2 id="clock" class="sectionHead"> <i class="fa fa-briefcase"></i> MIS EXPERIENCIAS</h2>
      <ul id="jobs">
         @foreach ($experiencias as $experiencia)
         <li>
            <div class="details">
               <h3>{{$experiencia->cargo}}</h3>
               <h4>{{$experiencia->empresa}}</h4>
               <h5>{{date('d/m/Y',strtotime($experiencia->fecha_inicio))}} -
                  {{date('d/m/Y',strtotime($experiencia->fecha_fin))}}</h5>
            </div>
            <p>{{$experiencia->descripcion}}</p>
         </li>
         @endforeach
      </ul>
      <div class="clear"></div>
      <h2 id="learn" class="sectionHead"> <i class="fa fa-graduation-cap"></i> MIS ESTUDIOS</h2>
      <ul id="schools">
         @foreach ($estudios as $estudio)
         <li>
            <div class="details">
               <h3>{{$estudio->universidad}}</h3>
               <h4>{{$estudio->especialidad}}</h4>
               <h5>{{date('d/m/Y',strtotime($estudio->fecha_inicio))}} -
                  {{date('d/m/Y',strtotime($estudio->fecha_fin))}}</h5>
            </div>
            <p>{{$estudio->descripcion}}</p>
         </li>
         @endforeach
      </ul>
      <div class="clear"></div>
      <h2 id="ribbon" class="sectionHead"> <i class="fa fa-keyboard"></i> Mis Herramientas / Software's</h2>
      <ul id="honorsAwards">
         @php
         $softwars=json_decode($softwares->softwares,true);
         @endphp
         @foreach ($softwars as $soft)
         <li>{{$soft}}</li>
         @endforeach
      </ul>
   </div>
   <div id="copyright">&copy; <?php echo date('Y'); ?> | Diseñado por
      <a href="http://www.themolitor.com/applicant/">www.themolitor.com</a>
      para Desarrolladores
   </div>
   <script src="{{ asset('js/core/jquery.min.js') }}"></script>
   {{-- <script src="js/prettyPhoto.js"></script> --}}
   <script type="text/javascript" charset="utf-8">
      eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(T).J(2(){4 8=$(q),C=$(\'C\'),c=$(\'c\'),A=$(\'#S-9\').p(\'R\');$(\'H#I\').6("J");$(\'H#I P\').y(2(){4 i=$(b).Q();$(b).U(V*i).r({Z:"0%"},Y,2(){$(b).O(\'W\').u(10)})});$(\'a[p-k]\').y(2(){$(b).L(\'k\',$(b).p(\'k\'))});$("a[k^=\'F\']").F({N:7,K:\'\',X:7,1d:o,1i:"1"});$("#3 #1h").1g(2(){$("#3 j, #3 v").G(\'d\');4 9=$("#3 j#9");5(9.n()!=A){9.6(\'d\').f();g 7}4 l=$("#3 j#l");5(l.n()==""){l.6(\'d\').f();g 7}4 h=$("#3 j#h");5(h.n()==""){h.6(\'d\').f();g 7}4 e=$("#3 v#e");5(e.n()==""){e.6(\'d\').f();g 7}});5(q.1o.1n=="#1l"){$(\'#3\').1e(t,2(){$(\'#16\').u(t)})}$(\'#15, #14\').12().13(\'#s\');2 m(){5(8.17()<18){c.6(\'E\')}D{c.G(\'E\')}}m();8.1b(2(){5(8.B()>19){$(\'#s\').x().r({w:"0"},o)}D{$(\'#s\').x().r({w:"-1m"},o)}4 z=$(q).B()*.1k;c.1c({11:\'M -\'+z+\'1f\'})});8.1a(2(){m()});8.1j(2(){m()})});',62,87,'||function|contactform|var|if|addClass|false|view|quiz||this|body|error|message|focus|return|email||input|rel|name|responsive|val|500|data|window|animate|sticker|800|fadeIn|textarea|top|stop|each|scrollPosition|quizAnswer|scrollTop|html|else|respond|prettyPhoto|removeClass|ul|skills|ready|social_tools|attr|0px|overlay_gallery|children|li|index|answer|the|document|delay|100|span|deeplinking|1000|right|600|backgroundPosition|clone|appendTo|socialIcons|titleName|messageSent|width|820|140|resize|scroll|css|default_width|slideUp|px|click|submit_btn|opacity|load|25|contact|60px|hash|location'.split('|'),0,{}))
   </script>
</body>

</html>