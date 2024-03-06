<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <title>Cosecha</title>
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  @vite('resources/css/style_sky.css')
  @vite('resources/css/style_mountains.css')
  @vite('resources/css/style_login.css')
  @vite('resources/css/alertdialog.css')
  @vite('resources/js/script.js')
  @vite('resources/js/script_mountains.js')
  @vite('resources/js/script_login.jsx', 'module')
  @vite('resources/js/alertdialog.js')
  @include('loading')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

</head>


<body>
  <div  id="demo" class="demo-container"></div>

 <section>

  <div class='air air0'></div>
  <div class='air air1'></div>
  <div class='air air2'></div>
  <div class='air air3'></div>
  <div class='air air4'></div>
 </section>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.7.14/lottie.min.js"></script>
 <script>console.clear();
var loginUrl = "{{ route('auth.login') }}";
var registerUrl = "{{ route('auth.register') }}";
</script>

 <script>
 !function(){function a(a,b){return a.zIndex===b.zIndex?0:a.zIndex<b.zIndex?-1:1}function b(){this.width=this.width?this.width:this.image.width,this.height=this.height?this.height:this.image.height}var c=window,d=document,e=d.documentElement,f=d.body,g=c.requestAnimationFrame||c.mozRequestAnimationFrame||c.webkitRequestAnimationFrame||c.msRequestAnimationFrame||c.oRequestAnimationFrame||function(a){c.setTimeout(a,20)},h=function(){},i={tracking:"scroll",trackingInvert:!1,x:0,y:0,damping:1,canvas:void 0,className:"",parent:document.body,elements:void 0,animating:!0,fullscreen:!0,preRender:h,postRender:h},j=!1,k=0,l=0,m=function(){k=e.scrollLeft||f.scrollLeft,l=e.scrollTop||f.scrollTop},n=!1,o=0,p=0,q=function(a){o=a.touches?a.touches[0].clientX:a.clientX,p=a.touches?a.touches[0].clientY:a.clientY};if(!c.CanvasRenderingContext2D)return c.Canvallax=function(){return!1};c.Canvallax=function s(a){if(!(this instanceof s))return new s(a);var b=this;return s.extend(this,i,a),b.canvas=b.canvas||d.createElement("canvas"),b.canvas.className+=" canvallax "+b.className,b.parent.insertBefore(b.canvas,b.parent.firstChild),b.fullscreen?(b.resizeFullscreen(),c.addEventListener("resize",b.resizeFullscreen.bind(b))):b.resize(b.width,b.height),b.ctx=b.canvas.getContext("2d"),b.elements=[],a&&a.elements&&b.addElements(a.elements),b.damping=!b.damping||b.damping<1?1:b.damping,b.render(),b},Canvallax.prototype={_x:0,_y:0,add:function(b){for(var c=b.length?b:arguments,d=c.length,e=0;d>e;e++)this.elements.push(c[e]);return this.elements.sort(a),this},remove:function(a){var b=this.elements.indexOf(a);return b>-1&&this.elements.splice(b,1),this},render:function(){var a=this,b=0,d=a.elements.length,e=0,f=0,h=a.fullscreen||"pointer"!==a.tracking;for(a.animating&&(a.animating=g(a.render.bind(a))),a.tracking&&("scroll"===a.tracking?(j||(j=!0,m(),c.addEventListener("scroll",m),c.addEventListener("touchmove",m)),a.x=k,a.y=l):"pointer"===a.tracking&&(n||(n=!0,c.addEventListener("mousemove",q),c.addEventListener("touchmove",q)),h||(e=a.canvas.offsetLeft,f=a.canvas.offsetTop,h=o>=e&&o<=e+a.width&&p>=f&&p<=f+a.height),h&&(a.x=-o+e,a.y=-p+f)),a.x=!h||a.trackingInvert!==!0&&"invertx"!==a.trackingInvert?a.x:-a.x,a.y=!h||a.trackingInvert!==!0&&"inverty"!==a.trackingInvert?a.y:-a.y),a._x+=(-a.x-a._x)/a.damping,a._y+=(-a.y-a._y)/a.damping,a.ctx.clearRect(0,0,a.width,a.height),a.preRender(a.ctx,a);d>b;b++)a.ctx.save(),a.elements[b]._render(a.ctx,a),a.ctx.restore();return a.postRender(a.ctx,a),this},resize:function(a,b){return this.width=this.canvas.width=a,this.height=this.canvas.height=b,this},resizeFullscreen:function(){return this.resize(c.innerWidth,c.innerHeight)},play:function(){return this.animating=!0,this.render()},pause:function(){return this.animating=!1,this}},Canvallax.createElement=function(){function a(a){var c=b(a);return a._pointCache&&a._pointChecksum===c||(a._pointCache=a.getTransformPoint(),a._pointChecksum=c),a._pointCache}function b(a){return[a.transformOrigin,a.x,a.y,a.width,a.height,a.size].join(" ")}var c=Math.PI/180,d={x:0,y:0,distance:1,fixed:!1,opacity:1,fill:!1,stroke:!1,lineWidth:!1,transformOrigin:"center center",scale:1,rotation:0,preRender:h,render:h,postRender:h,init:h,crop:!1,getTransformPoint:function(){var a=this,b=a.transformOrigin.split(" "),c={x:a.x,y:a.y};return"center"===b[0]?c.x+=a.width?a.width/2:a.size:"right"===b[0]&&(c.x+=a.width?a.width:2*a.size),"center"===b[1]?c.y+=a.height?a.height/2:a.size:"bottom"===b[1]&&(c.y+=a.height?a.height:2*a.size),c},_render:function(b,d){var e=this,f=e.distance||1,g=d._x,h=d._y,i=a(e);return e.preRender.call(e,b,d),e.blend&&(d.ctx.globalCompositeOperation=e.blend),d.ctx.globalAlpha=e.opacity,d.ctx.translate(i.x,i.y),e.scale===!1?(g*=f,h*=f):d.ctx.scale(f,f),e.fixed||d.ctx.translate(g,h),e.scale!==!1&&d.ctx.scale(e.scale,e.scale),e.rotation&&d.ctx.rotate(e.rotation*c),d.ctx.translate(-i.x,-i.y),e.crop&&(b.beginPath(),"function"==typeof e.crop?e.crop.call(e,b,d):b.rect(e.crop.x,e.crop.y,e.crop.width,e.crop.height),b.clip(),b.closePath()),e.outline&&(b.beginPath(),b.rect(e.x,e.y,e.width||2*e.size,e.height||2*e.size),b.closePath(),b.strokeStyle=e.outline,b.stroke()),e.render.call(e,b,d),this.fill&&(b.fillStyle=this.fill,b.fill()),this.stroke&&(this.lineWidth&&(b.lineWidth=this.lineWidth),b.strokeStyle=this.stroke,b.stroke()),e.postRender.call(e,b,d),e},clone:function(a){var a=Canvallax.extend({},this,a);return new this.constructor(a)}};return function(a){function b(a){return this instanceof b?(Canvallax.extend(this,a),this.init.apply(this,arguments),this):new b(a)}return b.prototype=Canvallax.extend({},d,a),b.prototype.constructor=b,b.clone=b.prototype.clone,b}}(),Canvallax.extend=function(a){a=a||{};var b=arguments.length,c=1;for(1===arguments.length&&(a=this,c=0);b>c;c++)if(arguments[c])for(var d in arguments[c])arguments[c].hasOwnProperty(d)&&(a[d]=arguments[c][d]);return a};var r=2*Math.PI;Canvallax.Circle=Canvallax.createElement({size:20,render:function(a){a.beginPath(),a.arc(this.x+this.size,this.y+this.size,this.size,0,r),a.closePath()}}),Canvallax.Element=Canvallax.createElement(),Canvallax.Image=Canvallax.createElement({src:null,image:null,width:null,height:null,init:function(a){this.image=this.image&&1===this.image.nodeType?this.image:a&&1===a.nodeType?a:new Image,b.bind(this)(),this.image.onload=b.bind(this),this.image.src=this.image.src||a.src||a},render:function(a){this.image&&a.drawImage(this.image,this.x,this.y,this.width,this.height)}});var r=2*Math.PI;Canvallax.Polygon=Canvallax.createElement({sides:6,size:20,render:function(a){var b=this.sides;for(a.translate(this.x+this.size,this.y+this.size),a.beginPath(),a.moveTo(this.size,0);b--;)a.lineTo(this.size*Math.cos(b*r/this.sides),this.size*Math.sin(b*r/this.sides));a.closePath()}}),Canvallax.Rectangle=Canvallax.createElement({width:100,height:100,render:function(a){a.beginPath(),a.rect(this.x,this.y,this.width,this.height),a.closePath()}})}();</script>

 <div id="myalertdialogerror" class="alertdialog">
  <label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert success">
      <span class="alertClose">X</span>
      <span class="alertText">¡Bienvenido, !
      <br class="clear"/></span>
    </div>
  </label>
</div>



@if (session('message'))
<div id="myalertdialogwarning" class="alertdialog">
  <label>
    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
    <div class="alert success">
      <span class="alertClose">X</span>
      <span class="alertText">{{ session('message') }}
      <br class="clear"/></span>
    </div>
  </label>
</div>
<script>
    window.onload = function() {
        showAlert('{{ session('message') }}');
    };
</script>
@endif




</body>
</html>
