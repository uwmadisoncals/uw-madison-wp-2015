(function($){

    /**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *       the user visible viewport of a web browser.
     *       only accounts for vertical position, not horizontal.
     */
    var $w = $(window);
    $.fn.visible = function(partial,hidden,direction){

        if (this.length < 1)
            return;

        var $t        = this.length > 1 ? this.eq(0) : this,
            t         = $t.get(0),
            vpWidth   = $w.width(),
            vpHeight  = $w.height(),
            direction = (direction) ? direction : 'both',
            clientSize = hidden === true ? t.offsetWidth * t.offsetHeight : true;

        if (typeof t.getBoundingClientRect === 'function'){

            // Use this native browser method, if available.
            var rec = t.getBoundingClientRect(),
                tViz = rec.top    >= 0 && rec.top    <  vpHeight,
                bViz = rec.bottom >  0 && rec.bottom <= vpHeight,
                lViz = rec.left   >= 0 && rec.left   <  vpWidth,
                rViz = rec.right  >  0 && rec.right  <= vpWidth,
                vVisible   = partial ? tViz || bViz : tViz && bViz,
                hVisible   = partial ? lViz || rViz : lViz && rViz;

            if(direction === 'both')
                return clientSize && vVisible && hVisible;
            else if(direction === 'vertical')
                return clientSize && vVisible;
            else if(direction === 'horizontal')
                return clientSize && hVisible;
        } else {

            var viewTop         = $w.scrollTop(),
                viewBottom      = viewTop + vpHeight,
                viewLeft        = $w.scrollLeft(),
                viewRight       = viewLeft + vpWidth,
                offset          = $t.offset(),
                _top            = offset.top,
                _bottom         = _top + $t.height(),
                _left           = offset.left,
                _right          = _left + $t.width(),
                compareTop      = partial === true ? _bottom : _top,
                compareBottom   = partial === true ? _top : _bottom,
                compareLeft     = partial === true ? _right : _left,
                compareRight    = partial === true ? _left : _right;

            if(direction === 'both')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop)) && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
            else if(direction === 'vertical')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
            else if(direction === 'horizontal')
                return !!clientSize && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
        }
    };

})(jQuery);

/*!
 * Suggest jQuery plugin
 *
 * Copyright (c) 2013 Florian Plank (http://www.polarblau.com/)
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * USAGE:
 *
 * $('#container').suggest(haystack, {
 *   suggestionColor   : '#cccccc',
 *   moreIndicatorClass: 'suggest-more',
 *   moreIndicatorText : '&hellip;'
 * });
 *
 */

(function($) {

  $.fn.suggest = function(source, options) {

    var settings = $.extend({
      suggestionColor       : '#ccc',
      moreIndicatorClass    : 'suggest-more',
      moreIndicatorText     : '&hellip;'
    }, options);

    return this.each(function() {

      $this = $(this);

      // this helper will show possible suggestions
      // and needs to match the input field in style
      var $suggest = $('<div/>', {
        'css' : {
          'position'        : 'absolute',
          'height'          : $this.height(),
          'width'           : $this.width(),
          'top'             : $this.css('borderTopWidth'),
          'left'            : $this.css('borderLeftWidth'),
          'padding'         : $this.cssShortForAllSides('padding'),
          'margin'          : $this.cssShortForAllSides('margin'),
          'fontFamily'      : $this.css('fontFamily'),
          'fontSize'        : $this.css('fontSize'),
          'fontStyle'       : $this.css('fontStyle'),
          'lineHeight'      : $this.css('lineHeight'),
          'fontWeight'      : $this.css('fontWeight'),
          'letterSpacing'   : $this.css('letterSpacing'),
          'backgroundColor' : $this.css('backgroundColor'),
          'color'           : settings.suggestionColor
        }
      });

      var $more = $('<span/>', {
        'css' : {
          'position'        : 'absolute',
          'top'             : $suggest.height() + parseInt($this.css('fontSize'), 10) / 2,
          'left'            : $suggest.width(),
          'display'         : 'block',
          'fontSize'        : $this.css('fontSize'),
          'fontFamily'      : $this.css('fontFamily'),
          'color'           : settings.suggestionColor
        },
        'class'             : settings.moreIndicatorClass
      })
      .html(settings.moreIndicatorText)
      .hide();

      $this
        .attr({
          'autocomplete'    : "off",
          'spellcheck'      : "false",
          'dir'             : "ltr"
        })
        // by setting the background to transparent, we will
        // be able to "see through" to the suggestion helper
        .css({
          'background'      : 'transparent'
        })
        .wrap($('<div/>', {
          'css': {
            'position'      : 'relative',
            'paddingBottom' : '1em'
          }
        }))

        .bind('keydown.suggest', function(e){
          var code = (e.keyCode ? e.keyCode : e.which);

          // the tab key will force the focus to the next input
          // already on keydown, let's prevent that
          // unless the alt key is pressed for convenience
          if (code == 9 && !e.altKey) {
            e.preventDefault();

          // let's prevent default enter behavior while a suggestion
          // is being accepted (e.g. while submitting a form)
          /*} else if (code == 13) {*/
            /*if (!$suggest.is(':empty')) {
              e.preventDefault();
            }*/

          // use arrow keys to cycle through suggestions
          } else if (code == 38 || code == 40) {
            e.preventDefault();
            var suggestions = $(this).data('suggestions');

            if (suggestions.all.length > 1) {
              // arrow down:
              if (code == 40 && suggestions.index < suggestions.all.length - 1) {
                suggestions.suggest.html(suggestions.all[++suggestions.index]);
              // arrow up:
              } else if (code == 38 && suggestions.index > 0) {
                suggestions.suggest.html(suggestions.all[--suggestions.index]);
              }
              $(this).data('suggestions').index = suggestions.index;
            }
          }
        })

        .bind('keyup.suggest', function(e) {
          var code = (e.keyCode ? e.keyCode : e.which);

          // Have the arrow keys been pressed?
          if (code == 38 || code == 40) {
            return false;
          }

          // be default we hide the "more suggestions" indicator
          $more.hide();

          // what has been input?
          var needle = $(this).val();

          // convert spaces to make them visible
          var needleWithWhiteSpace = needle.replace(' ', '&nbsp;');

          // accept suggestion with 'enter' or 'tab'
          // if the suggestion hasn't been accepted yet
          if (code == 9) {
            // only accept if there's anything suggested
            if ($suggest.text().length > 0) {
              e.preventDefault();
              var suggestions = $(this).data('suggestions');
              $(this).val(suggestions.terms[suggestions.index]);
              // clean the suggestion for the looks
              $suggest.empty();
              return false;
            }
          }

          // make sure the helper is empty
          $suggest.empty();

          // if nothing has been input, leave it with that
          if (!$.trim(needle).length) {
            return false;
          }

          // see if anything in source matches the input
          // by escaping the input' string for use with regex
          // we allow to search for terms containing specials chars as well
          var regex = new RegExp('^' + needle.replace(/[-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&"), 'i');
          var suggestions = [], terms = [];
          for (var i = 0, l = source; i < l.length; i++) {
            if (regex.test(l[i])) {
              terms.push(l[i]);
              suggestions.push(needleWithWhiteSpace + l[i].slice(needle.length));
            }
          }
          if (suggestions.length > 0) {
            // if there's any suggestions found, use the first
            // don't show the suggestion if it's identical with the current input
            if (suggestions[0] !== needle) {
              $suggest.html(suggestions[0]);
            }
            // store found suggestions in data for use with arrow keys
            $(this).data('suggestions', {
              'all'    : suggestions,
              'terms'  : terms,
              'index'  : 0,
              'suggest': $suggest
            });

            // show the indicator that there's more suggestions available
            // only for more than one suggestion
            if (suggestions.length > 1) {
              $more.show();
            }
          }
        })

        // clear suggestion on blur
        .bind('blur.suggest', function(){
          $suggest.empty();
        });

        // insert the suggestion helpers within the wrapper
        $suggest.insertAfter($this);
        $more.insertAfter($suggest);

    });

  }; 

  /* A little helper to calculate the sum of different
   * CSS properties around all four sides
   *
   * EXAMPLE:
   * $('#my-div').cssSum('padding');
   */
  $.fn.cssShortForAllSides = function(property) {
    var $self = $(this), sum = [];
    var properties = $.map(['Top', 'Right', 'Bottom', 'Left'], function(side){
      return property + side;
    });
    $.each(properties, function(i, e) {
      sum.push($self.css(e) || "0");
    });
    return sum.join(' ');
  };
})(jQuery);
!function(a,b,c,d){function e(b,c){this.settings=null,this.options=a.extend({},e.Defaults,c),this.$element=a(b),this.drag=a.extend({},m),this.state=a.extend({},n),this.e=a.extend({},o),this._plugins={},this._supress={},this._current=null,this._speed=null,this._coordinates=[],this._breakpoint=null,this._width=null,this._items=[],this._clones=[],this._mergers=[],this._invalidated={},this._pipe=[],a.each(e.Plugins,a.proxy(function(a,b){this._plugins[a[0].toLowerCase()+a.slice(1)]=new b(this)},this)),a.each(e.Pipe,a.proxy(function(b,c){this._pipe.push({filter:c.filter,run:a.proxy(c.run,this)})},this)),this.setup(),this.initialize()}function f(a){if(a.touches!==d)return{x:a.touches[0].pageX,y:a.touches[0].pageY};if(a.touches===d){if(a.pageX!==d)return{x:a.pageX,y:a.pageY};if(a.pageX===d)return{x:a.clientX,y:a.clientY}}}function g(a){var b,d,e=c.createElement("div"),f=a;for(b in f)if(d=f[b],"undefined"!=typeof e.style[d])return e=null,[d,b];return[!1]}function h(){return g(["transition","WebkitTransition","MozTransition","OTransition"])[1]}function i(){return g(["transform","WebkitTransform","MozTransform","OTransform","msTransform"])[0]}function j(){return g(["perspective","webkitPerspective","MozPerspective","OPerspective","MsPerspective"])[0]}function k(){return"ontouchstart"in b||!!navigator.msMaxTouchPoints}function l(){return b.navigator.msPointerEnabled}var m,n,o;m={start:0,startX:0,startY:0,current:0,currentX:0,currentY:0,offsetX:0,offsetY:0,distance:null,startTime:0,endTime:0,updatedX:0,targetEl:null},n={isTouch:!1,isScrolling:!1,isSwiping:!1,direction:!1,inMotion:!1},o={_onDragStart:null,_onDragMove:null,_onDragEnd:null,_transitionEnd:null,_resizer:null,_responsiveCall:null,_goToLoop:null,_checkVisibile:null},e.Defaults={items:3,loop:!1,center:!1,mouseDrag:!0,touchDrag:!0,pullDrag:!0,freeDrag:!1,margin:0,stagePadding:0,merge:!1,mergeFit:!0,autoWidth:!1,startPosition:0,rtl:!1,smartSpeed:250,fluidSpeed:!1,dragEndSpeed:!1,responsive:{},responsiveRefreshRate:200,responsiveBaseElement:b,responsiveClass:!1,fallbackEasing:"swing",info:!1,nestedItemSelector:!1,itemElement:"div",stageElement:"div",themeClass:"owl-theme",baseClass:"owl-carousel",itemClass:"owl-item",centerClass:"center",activeClass:"active"},e.Width={Default:"default",Inner:"inner",Outer:"outer"},e.Plugins={},e.Pipe=[{filter:["width","items","settings"],run:function(a){a.current=this._items&&this._items[this.relative(this._current)]}},{filter:["items","settings"],run:function(){var a=this._clones,b=this.$stage.children(".cloned");(b.length!==a.length||!this.settings.loop&&a.length>0)&&(this.$stage.children(".cloned").remove(),this._clones=[])}},{filter:["items","settings"],run:function(){var a,b,c=this._clones,d=this._items,e=this.settings.loop?c.length-Math.max(2*this.settings.items,4):0;for(a=0,b=Math.abs(e/2);b>a;a++)e>0?(this.$stage.children().eq(d.length+c.length-1).remove(),c.pop(),this.$stage.children().eq(0).remove(),c.pop()):(c.push(c.length/2),this.$stage.append(d[c[c.length-1]].clone().addClass("cloned")),c.push(d.length-1-(c.length-1)/2),this.$stage.prepend(d[c[c.length-1]].clone().addClass("cloned")))}},{filter:["width","items","settings"],run:function(){var a,b,c,d=this.settings.rtl?1:-1,e=(this.width()/this.settings.items).toFixed(3),f=0;for(this._coordinates=[],b=0,c=this._clones.length+this._items.length;c>b;b++)a=this._mergers[this.relative(b)],a=this.settings.mergeFit&&Math.min(a,this.settings.items)||a,f+=(this.settings.autoWidth?this._items[this.relative(b)].width()+this.settings.margin:e*a)*d,this._coordinates.push(f)}},{filter:["width","items","settings"],run:function(){var b,c,d=(this.width()/this.settings.items).toFixed(3),e={width:Math.abs(this._coordinates[this._coordinates.length-1])+2*this.settings.stagePadding,"padding-left":this.settings.stagePadding||"","padding-right":this.settings.stagePadding||""};if(this.$stage.css(e),e={width:this.settings.autoWidth?"auto":d-this.settings.margin},e[this.settings.rtl?"margin-left":"margin-right"]=this.settings.margin,!this.settings.autoWidth&&a.grep(this._mergers,function(a){return a>1}).length>0)for(b=0,c=this._coordinates.length;c>b;b++)e.width=Math.abs(this._coordinates[b])-Math.abs(this._coordinates[b-1]||0)-this.settings.margin,this.$stage.children().eq(b).css(e);else this.$stage.children().css(e)}},{filter:["width","items","settings"],run:function(a){a.current&&this.reset(this.$stage.children().index(a.current))}},{filter:["position"],run:function(){this.animate(this.coordinates(this._current))}},{filter:["width","position","items","settings"],run:function(){var a,b,c,d,e=this.settings.rtl?1:-1,f=2*this.settings.stagePadding,g=this.coordinates(this.current())+f,h=g+this.width()*e,i=[];for(c=0,d=this._coordinates.length;d>c;c++)a=this._coordinates[c-1]||0,b=Math.abs(this._coordinates[c])+f*e,(this.op(a,"<=",g)&&this.op(a,">",h)||this.op(b,"<",g)&&this.op(b,">",h))&&i.push(c);this.$stage.children("."+this.settings.activeClass).removeClass(this.settings.activeClass),this.$stage.children(":eq("+i.join("), :eq(")+")").addClass(this.settings.activeClass),this.settings.center&&(this.$stage.children("."+this.settings.centerClass).removeClass(this.settings.centerClass),this.$stage.children().eq(this.current()).addClass(this.settings.centerClass))}}],e.prototype.initialize=function(){if(this.trigger("initialize"),this.$element.addClass(this.settings.baseClass).addClass(this.settings.themeClass).toggleClass("owl-rtl",this.settings.rtl),this.browserSupport(),this.settings.autoWidth&&this.state.imagesLoaded!==!0){var b,c,e;if(b=this.$element.find("img"),c=this.settings.nestedItemSelector?"."+this.settings.nestedItemSelector:d,e=this.$element.children(c).width(),b.length&&0>=e)return this.preloadAutoWidthImages(b),!1}this.$element.addClass("owl-loading"),this.$stage=a("<"+this.settings.stageElement+' class="owl-stage"/>').wrap('<div class="owl-stage-outer">'),this.$element.append(this.$stage.parent()),this.replace(this.$element.children().not(this.$stage.parent())),this._width=this.$element.width(),this.refresh(),this.$element.removeClass("owl-loading").addClass("owl-loaded"),this.eventsCall(),this.internalEvents(),this.addTriggerableEvents(),this.trigger("initialized")},e.prototype.setup=function(){var b=this.viewport(),c=this.options.responsive,d=-1,e=null;c?(a.each(c,function(a){b>=a&&a>d&&(d=Number(a))}),e=a.extend({},this.options,c[d]),delete e.responsive,e.responsiveClass&&this.$element.attr("class",function(a,b){return b.replace(/\b owl-responsive-\S+/g,"")}).addClass("owl-responsive-"+d)):e=a.extend({},this.options),(null===this.settings||this._breakpoint!==d)&&(this.trigger("change",{property:{name:"settings",value:e}}),this._breakpoint=d,this.settings=e,this.invalidate("settings"),this.trigger("changed",{property:{name:"settings",value:this.settings}}))},e.prototype.optionsLogic=function(){this.$element.toggleClass("owl-center",this.settings.center),this.settings.loop&&this._items.length<this.settings.items&&(this.settings.loop=!1),this.settings.autoWidth&&(this.settings.stagePadding=!1,this.settings.merge=!1)},e.prototype.prepare=function(b){var c=this.trigger("prepare",{content:b});return c.data||(c.data=a("<"+this.settings.itemElement+"/>").addClass(this.settings.itemClass).append(b)),this.trigger("prepared",{content:c.data}),c.data},e.prototype.update=function(){for(var b=0,c=this._pipe.length,d=a.proxy(function(a){return this[a]},this._invalidated),e={};c>b;)(this._invalidated.all||a.grep(this._pipe[b].filter,d).length>0)&&this._pipe[b].run(e),b++;this._invalidated={}},e.prototype.width=function(a){switch(a=a||e.Width.Default){case e.Width.Inner:case e.Width.Outer:return this._width;default:return this._width-2*this.settings.stagePadding+this.settings.margin}},e.prototype.refresh=function(){if(0===this._items.length)return!1;(new Date).getTime();this.trigger("refresh"),this.setup(),this.optionsLogic(),this.$stage.addClass("owl-refresh"),this.update(),this.$stage.removeClass("owl-refresh"),this.state.orientation=b.orientation,this.watchVisibility(),this.trigger("refreshed")},e.prototype.eventsCall=function(){this.e._onDragStart=a.proxy(function(a){this.onDragStart(a)},this),this.e._onDragMove=a.proxy(function(a){this.onDragMove(a)},this),this.e._onDragEnd=a.proxy(function(a){this.onDragEnd(a)},this),this.e._onResize=a.proxy(function(a){this.onResize(a)},this),this.e._transitionEnd=a.proxy(function(a){this.transitionEnd(a)},this),this.e._preventClick=a.proxy(function(a){this.preventClick(a)},this)},e.prototype.onThrottledResize=function(){b.clearTimeout(this.resizeTimer),this.resizeTimer=b.setTimeout(this.e._onResize,this.settings.responsiveRefreshRate)},e.prototype.onResize=function(){return this._items.length?this._width===this.$element.width()?!1:this.trigger("resize").isDefaultPrevented()?!1:(this._width=this.$element.width(),this.invalidate("width"),this.refresh(),void this.trigger("resized")):!1},e.prototype.eventsRouter=function(a){var b=a.type;"mousedown"===b||"touchstart"===b?this.onDragStart(a):"mousemove"===b||"touchmove"===b?this.onDragMove(a):"mouseup"===b||"touchend"===b?this.onDragEnd(a):"touchcancel"===b&&this.onDragEnd(a)},e.prototype.internalEvents=function(){var c=(k(),l());this.settings.mouseDrag?(this.$stage.on("mousedown",a.proxy(function(a){this.eventsRouter(a)},this)),this.$stage.on("dragstart",function(){return!1}),this.$stage.get(0).onselectstart=function(){return!1}):this.$element.addClass("owl-text-select-on"),this.settings.touchDrag&&!c&&this.$stage.on("touchstart touchcancel",a.proxy(function(a){this.eventsRouter(a)},this)),this.transitionEndVendor&&this.on(this.$stage.get(0),this.transitionEndVendor,this.e._transitionEnd,!1),this.settings.responsive!==!1&&this.on(b,"resize",a.proxy(this.onThrottledResize,this))},e.prototype.onDragStart=function(d){var e,g,h,i;if(e=d.originalEvent||d||b.event,3===e.which||this.state.isTouch)return!1;if("mousedown"===e.type&&this.$stage.addClass("owl-grab"),this.trigger("drag"),this.drag.startTime=(new Date).getTime(),this.speed(0),this.state.isTouch=!0,this.state.isScrolling=!1,this.state.isSwiping=!1,this.drag.distance=0,g=f(e).x,h=f(e).y,this.drag.offsetX=this.$stage.position().left,this.drag.offsetY=this.$stage.position().top,this.settings.rtl&&(this.drag.offsetX=this.$stage.position().left+this.$stage.width()-this.width()+this.settings.margin),this.state.inMotion&&this.support3d)i=this.getTransformProperty(),this.drag.offsetX=i,this.animate(i),this.state.inMotion=!0;else if(this.state.inMotion&&!this.support3d)return this.state.inMotion=!1,!1;this.drag.startX=g-this.drag.offsetX,this.drag.startY=h-this.drag.offsetY,this.drag.start=g-this.drag.startX,this.drag.targetEl=e.target||e.srcElement,this.drag.updatedX=this.drag.start,("IMG"===this.drag.targetEl.tagName||"A"===this.drag.targetEl.tagName)&&(this.drag.targetEl.draggable=!1),a(c).on("mousemove.owl.dragEvents mouseup.owl.dragEvents touchmove.owl.dragEvents touchend.owl.dragEvents",a.proxy(function(a){this.eventsRouter(a)},this))},e.prototype.onDragMove=function(a){var c,e,g,h,i,j;this.state.isTouch&&(this.state.isScrolling||(c=a.originalEvent||a||b.event,e=f(c).x,g=f(c).y,this.drag.currentX=e-this.drag.startX,this.drag.currentY=g-this.drag.startY,this.drag.distance=this.drag.currentX-this.drag.offsetX,this.drag.distance<0?this.state.direction=this.settings.rtl?"right":"left":this.drag.distance>0&&(this.state.direction=this.settings.rtl?"left":"right"),this.settings.loop?this.op(this.drag.currentX,">",this.coordinates(this.minimum()))&&"right"===this.state.direction?this.drag.currentX-=(this.settings.center&&this.coordinates(0))-this.coordinates(this._items.length):this.op(this.drag.currentX,"<",this.coordinates(this.maximum()))&&"left"===this.state.direction&&(this.drag.currentX+=(this.settings.center&&this.coordinates(0))-this.coordinates(this._items.length)):(h=this.coordinates(this.settings.rtl?this.maximum():this.minimum()),i=this.coordinates(this.settings.rtl?this.minimum():this.maximum()),j=this.settings.pullDrag?this.drag.distance/5:0,this.drag.currentX=Math.max(Math.min(this.drag.currentX,h+j),i+j)),(this.drag.distance>8||this.drag.distance<-8)&&(c.preventDefault!==d?c.preventDefault():c.returnValue=!1,this.state.isSwiping=!0),this.drag.updatedX=this.drag.currentX,(this.drag.currentY>16||this.drag.currentY<-16)&&this.state.isSwiping===!1&&(this.state.isScrolling=!0,this.drag.updatedX=this.drag.start),this.animate(this.drag.updatedX)))},e.prototype.onDragEnd=function(b){var d,e,f;if(this.state.isTouch){if("mouseup"===b.type&&this.$stage.removeClass("owl-grab"),this.trigger("dragged"),this.drag.targetEl.removeAttribute("draggable"),this.state.isTouch=!1,this.state.isScrolling=!1,this.state.isSwiping=!1,0===this.drag.distance&&this.state.inMotion!==!0)return this.state.inMotion=!1,!1;this.drag.endTime=(new Date).getTime(),d=this.drag.endTime-this.drag.startTime,e=Math.abs(this.drag.distance),(e>3||d>300)&&this.removeClick(this.drag.targetEl),f=this.closest(this.drag.updatedX),this.speed(this.settings.dragEndSpeed||this.settings.smartSpeed),this.current(f),this.invalidate("position"),this.update(),this.settings.pullDrag||this.drag.updatedX!==this.coordinates(f)||this.transitionEnd(),this.drag.distance=0,a(c).off(".owl.dragEvents")}},e.prototype.removeClick=function(c){this.drag.targetEl=c,a(c).on("click.preventClick",this.e._preventClick),b.setTimeout(function(){a(c).off("click.preventClick")},300)},e.prototype.preventClick=function(b){b.preventDefault?b.preventDefault():b.returnValue=!1,b.stopPropagation&&b.stopPropagation(),a(b.target).off("click.preventClick")},e.prototype.getTransformProperty=function(){var a,c;return a=b.getComputedStyle(this.$stage.get(0),null).getPropertyValue(this.vendorName+"transform"),a=a.replace(/matrix(3d)?\(|\)/g,"").split(","),c=16===a.length,c!==!0?a[4]:a[12]},e.prototype.closest=function(b){var c=-1,d=30,e=this.width(),f=this.coordinates();return this.settings.freeDrag||a.each(f,a.proxy(function(a,g){return b>g-d&&g+d>b?c=a:this.op(b,"<",g)&&this.op(b,">",f[a+1]||g-e)&&(c="left"===this.state.direction?a+1:a),-1===c},this)),this.settings.loop||(this.op(b,">",f[this.minimum()])?c=b=this.minimum():this.op(b,"<",f[this.maximum()])&&(c=b=this.maximum())),c},e.prototype.animate=function(b){this.trigger("translate"),this.state.inMotion=this.speed()>0,this.support3d?this.$stage.css({transform:"translate3d("+b+"px,0px, 0px)",transition:this.speed()/1e3+"s"}):this.state.isTouch?this.$stage.css({left:b+"px"}):this.$stage.animate({left:b},this.speed()/1e3,this.settings.fallbackEasing,a.proxy(function(){this.state.inMotion&&this.transitionEnd()},this))},e.prototype.current=function(a){if(a===d)return this._current;if(0===this._items.length)return d;if(a=this.normalize(a),this._current!==a){var b=this.trigger("change",{property:{name:"position",value:a}});b.data!==d&&(a=this.normalize(b.data)),this._current=a,this.invalidate("position"),this.trigger("changed",{property:{name:"position",value:this._current}})}return this._current},e.prototype.invalidate=function(a){this._invalidated[a]=!0},e.prototype.reset=function(a){a=this.normalize(a),a!==d&&(this._speed=0,this._current=a,this.suppress(["translate","translated"]),this.animate(this.coordinates(a)),this.release(["translate","translated"]))},e.prototype.normalize=function(b,c){var e=c?this._items.length:this._items.length+this._clones.length;return!a.isNumeric(b)||1>e?d:b=this._clones.length?(b%e+e)%e:Math.max(this.minimum(c),Math.min(this.maximum(c),b))},e.prototype.relative=function(a){return a=this.normalize(a),a-=this._clones.length/2,this.normalize(a,!0)},e.prototype.maximum=function(a){var b,c,d,e=0,f=this.settings;if(a)return this._items.length-1;if(!f.loop&&f.center)b=this._items.length-1;else if(f.loop||f.center)if(f.loop||f.center)b=this._items.length+f.items;else{if(!f.autoWidth&&!f.merge)throw"Can not detect maximum absolute position.";for(revert=f.rtl?1:-1,c=this.$stage.width()-this.$element.width();(d=this.coordinates(e))&&!(d*revert>=c);)b=++e}else b=this._items.length-f.items;return b},e.prototype.minimum=function(a){return a?0:this._clones.length/2},e.prototype.items=function(a){return a===d?this._items.slice():(a=this.normalize(a,!0),this._items[a])},e.prototype.mergers=function(a){return a===d?this._mergers.slice():(a=this.normalize(a,!0),this._mergers[a])},e.prototype.clones=function(b){var c=this._clones.length/2,e=c+this._items.length,f=function(a){return a%2===0?e+a/2:c-(a+1)/2};return b===d?a.map(this._clones,function(a,b){return f(b)}):a.map(this._clones,function(a,c){return a===b?f(c):null})},e.prototype.speed=function(a){return a!==d&&(this._speed=a),this._speed},e.prototype.coordinates=function(b){var c=null;return b===d?a.map(this._coordinates,a.proxy(function(a,b){return this.coordinates(b)},this)):(this.settings.center?(c=this._coordinates[b],c+=(this.width()-c+(this._coordinates[b-1]||0))/2*(this.settings.rtl?-1:1)):c=this._coordinates[b-1]||0,c)},e.prototype.duration=function(a,b,c){return Math.min(Math.max(Math.abs(b-a),1),6)*Math.abs(c||this.settings.smartSpeed)},e.prototype.to=function(c,d){if(this.settings.loop){var e=c-this.relative(this.current()),f=this.current(),g=this.current(),h=this.current()+e,i=0>g-h?!0:!1,j=this._clones.length+this._items.length;h<this.settings.items&&i===!1?(f=g+this._items.length,this.reset(f)):h>=j-this.settings.items&&i===!0&&(f=g-this._items.length,this.reset(f)),b.clearTimeout(this.e._goToLoop),this.e._goToLoop=b.setTimeout(a.proxy(function(){this.speed(this.duration(this.current(),f+e,d)),this.current(f+e),this.update()},this),30)}else this.speed(this.duration(this.current(),c,d)),this.current(c),this.update()},e.prototype.next=function(a){a=a||!1,this.to(this.relative(this.current())+1,a)},e.prototype.prev=function(a){a=a||!1,this.to(this.relative(this.current())-1,a)},e.prototype.transitionEnd=function(a){return a!==d&&(a.stopPropagation(),(a.target||a.srcElement||a.originalTarget)!==this.$stage.get(0))?!1:(this.state.inMotion=!1,void this.trigger("translated"))},e.prototype.viewport=function(){var d;if(this.options.responsiveBaseElement!==b)d=a(this.options.responsiveBaseElement).width();else if(b.innerWidth)d=b.innerWidth;else{if(!c.documentElement||!c.documentElement.clientWidth)throw"Can not detect viewport width.";d=c.documentElement.clientWidth}return d},e.prototype.replace=function(b){this.$stage.empty(),this._items=[],b&&(b=b instanceof jQuery?b:a(b)),this.settings.nestedItemSelector&&(b=b.find("."+this.settings.nestedItemSelector)),b.filter(function(){return 1===this.nodeType}).each(a.proxy(function(a,b){b=this.prepare(b),this.$stage.append(b),this._items.push(b),this._mergers.push(1*b.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)},this)),this.reset(a.isNumeric(this.settings.startPosition)?this.settings.startPosition:0),this.invalidate("items")},e.prototype.add=function(a,b){b=b===d?this._items.length:this.normalize(b,!0),this.trigger("add",{content:a,position:b}),0===this._items.length||b===this._items.length?(this.$stage.append(a),this._items.push(a),this._mergers.push(1*a.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)):(this._items[b].before(a),this._items.splice(b,0,a),this._mergers.splice(b,0,1*a.find("[data-merge]").andSelf("[data-merge]").attr("data-merge")||1)),this.invalidate("items"),this.trigger("added",{content:a,position:b})},e.prototype.remove=function(a){a=this.normalize(a,!0),a!==d&&(this.trigger("remove",{content:this._items[a],position:a}),this._items[a].remove(),this._items.splice(a,1),this._mergers.splice(a,1),this.invalidate("items"),this.trigger("removed",{content:null,position:a}))},e.prototype.addTriggerableEvents=function(){var b=a.proxy(function(b,c){return a.proxy(function(a){a.relatedTarget!==this&&(this.suppress([c]),b.apply(this,[].slice.call(arguments,1)),this.release([c]))},this)},this);a.each({next:this.next,prev:this.prev,to:this.to,destroy:this.destroy,refresh:this.refresh,replace:this.replace,add:this.add,remove:this.remove},a.proxy(function(a,c){this.$element.on(a+".owl.carousel",b(c,a+".owl.carousel"))},this))},e.prototype.watchVisibility=function(){function c(a){return a.offsetWidth>0&&a.offsetHeight>0}function d(){c(this.$element.get(0))&&(this.$element.removeClass("owl-hidden"),this.refresh(),b.clearInterval(this.e._checkVisibile))}c(this.$element.get(0))||(this.$element.addClass("owl-hidden"),b.clearInterval(this.e._checkVisibile),this.e._checkVisibile=b.setInterval(a.proxy(d,this),500))},e.prototype.preloadAutoWidthImages=function(b){var c,d,e,f;c=0,d=this,b.each(function(g,h){e=a(h),f=new Image,f.onload=function(){c++,e.attr("src",f.src),e.css("opacity",1),c>=b.length&&(d.state.imagesLoaded=!0,d.initialize())},f.src=e.attr("src")||e.attr("data-src")||e.attr("data-src-retina")})},e.prototype.destroy=function(){this.$element.hasClass(this.settings.themeClass)&&this.$element.removeClass(this.settings.themeClass),this.settings.responsive!==!1&&a(b).off("resize.owl.carousel"),this.transitionEndVendor&&this.off(this.$stage.get(0),this.transitionEndVendor,this.e._transitionEnd);for(var d in this._plugins)this._plugins[d].destroy();(this.settings.mouseDrag||this.settings.touchDrag)&&(this.$stage.off("mousedown touchstart touchcancel"),a(c).off(".owl.dragEvents"),this.$stage.get(0).onselectstart=function(){},this.$stage.off("dragstart",function(){return!1})),this.$element.off(".owl"),this.$stage.children(".cloned").remove(),this.e=null,this.$element.removeData("owlCarousel"),this.$stage.children().contents().unwrap(),this.$stage.children().unwrap(),this.$stage.unwrap()},e.prototype.op=function(a,b,c){var d=this.settings.rtl;switch(b){case"<":return d?a>c:c>a;case">":return d?c>a:a>c;case">=":return d?c>=a:a>=c;case"<=":return d?a>=c:c>=a}},e.prototype.on=function(a,b,c,d){a.addEventListener?a.addEventListener(b,c,d):a.attachEvent&&a.attachEvent("on"+b,c)},e.prototype.off=function(a,b,c,d){a.removeEventListener?a.removeEventListener(b,c,d):a.detachEvent&&a.detachEvent("on"+b,c)},e.prototype.trigger=function(b,c,d){var e={item:{count:this._items.length,index:this.current()}},f=a.camelCase(a.grep(["on",b,d],function(a){return a}).join("-").toLowerCase()),g=a.Event([b,"owl",d||"carousel"].join(".").toLowerCase(),a.extend({relatedTarget:this},e,c));return this._supress[b]||(a.each(this._plugins,function(a,b){b.onTrigger&&b.onTrigger(g)}),this.$element.trigger(g),this.settings&&"function"==typeof this.settings[f]&&this.settings[f].apply(this,g)),g},e.prototype.suppress=function(b){a.each(b,a.proxy(function(a,b){this._supress[b]=!0},this))},e.prototype.release=function(b){a.each(b,a.proxy(function(a,b){delete this._supress[b]},this))},e.prototype.browserSupport=function(){if(this.support3d=j(),this.support3d){this.transformVendor=i();var a=["transitionend","webkitTransitionEnd","transitionend","oTransitionEnd"];this.transitionEndVendor=a[h()],this.vendorName=this.transformVendor.replace(/Transform/i,""),this.vendorName=""!==this.vendorName?"-"+this.vendorName.toLowerCase()+"-":""}this.state.orientation=b.orientation},a.fn.owlCarousel=function(b){return this.each(function(){a(this).data("owlCarousel")||a(this).data("owlCarousel",new e(this,b))})},a.fn.owlCarousel.Constructor=e}(window.Zepto||window.jQuery,window,document),function(a,b){var c=function(b){this._core=b,this._loaded=[],this._handlers={"initialized.owl.carousel change.owl.carousel":a.proxy(function(b){if(b.namespace&&this._core.settings&&this._core.settings.lazyLoad&&(b.property&&"position"==b.property.name||"initialized"==b.type))for(var c=this._core.settings,d=c.center&&Math.ceil(c.items/2)||c.items,e=c.center&&-1*d||0,f=(b.property&&b.property.value||this._core.current())+e,g=this._core.clones().length,h=a.proxy(function(a,b){this.load(b)},this);e++<d;)this.load(g/2+this._core.relative(f)),g&&a.each(this._core.clones(this._core.relative(f++)),h)},this)},this._core.options=a.extend({},c.Defaults,this._core.options),this._core.$element.on(this._handlers)};c.Defaults={lazyLoad:!1},c.prototype.load=function(c){var d=this._core.$stage.children().eq(c),e=d&&d.find(".owl-lazy");!e||a.inArray(d.get(0),this._loaded)>-1||(e.each(a.proxy(function(c,d){var e,f=a(d),g=b.devicePixelRatio>1&&f.attr("data-src-retina")||f.attr("data-src");this._core.trigger("load",{element:f,url:g},"lazy"),f.is("img")?f.one("load.owl.lazy",a.proxy(function(){f.css("opacity",1),this._core.trigger("loaded",{element:f,url:g},"lazy")},this)).attr("src",g):(e=new Image,e.onload=a.proxy(function(){f.css({"background-image":"url("+g+")",opacity:"1"}),this._core.trigger("loaded",{element:f,url:g},"lazy")},this),e.src=g)},this)),this._loaded.push(d.get(0)))},c.prototype.destroy=function(){var a,b;for(a in this.handlers)this._core.$element.off(a,this.handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.Lazy=c}(window.Zepto||window.jQuery,window,document),function(a){var b=function(c){this._core=c,this._handlers={"initialized.owl.carousel":a.proxy(function(){this._core.settings.autoHeight&&this.update()},this),"changed.owl.carousel":a.proxy(function(a){this._core.settings.autoHeight&&"position"==a.property.name&&this.update()},this),"loaded.owl.lazy":a.proxy(function(a){this._core.settings.autoHeight&&a.element.closest("."+this._core.settings.itemClass)===this._core.$stage.children().eq(this._core.current())&&this.update()},this)},this._core.options=a.extend({},b.Defaults,this._core.options),this._core.$element.on(this._handlers)};b.Defaults={autoHeight:!1,autoHeightClass:"owl-height"},b.prototype.update=function(){this._core.$stage.parent().height(this._core.$stage.children().eq(this._core.current()).height()).addClass(this._core.settings.autoHeightClass)},b.prototype.destroy=function(){var a,b;for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.AutoHeight=b}(window.Zepto||window.jQuery,window,document),function(a,b,c){var d=function(b){this._core=b,this._videos={},this._playing=null,this._fullscreen=!1,this._handlers={"resize.owl.carousel":a.proxy(function(a){this._core.settings.video&&!this.isInFullScreen()&&a.preventDefault()},this),"refresh.owl.carousel changed.owl.carousel":a.proxy(function(){this._playing&&this.stop()},this),"prepared.owl.carousel":a.proxy(function(b){var c=a(b.content).find(".owl-video");c.length&&(c.css("display","none"),this.fetch(c,a(b.content)))},this)},this._core.options=a.extend({},d.Defaults,this._core.options),this._core.$element.on(this._handlers),this._core.$element.on("click.owl.video",".owl-video-play-icon",a.proxy(function(a){this.play(a)},this))};d.Defaults={video:!1,videoHeight:!1,videoWidth:!1},d.prototype.fetch=function(a,b){var c=a.attr("data-vimeo-id")?"vimeo":"youtube",d=a.attr("data-vimeo-id")||a.attr("data-youtube-id"),e=a.attr("data-width")||this._core.settings.videoWidth,f=a.attr("data-height")||this._core.settings.videoHeight,g=a.attr("href");if(!g)throw new Error("Missing video URL.");if(d=g.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),d[3].indexOf("youtu")>-1)c="youtube";else{if(!(d[3].indexOf("vimeo")>-1))throw new Error("Video URL not supported.");c="vimeo"}d=d[6],this._videos[g]={type:c,id:d,width:e,height:f},b.attr("data-video",g),this.thumbnail(a,this._videos[g])},d.prototype.thumbnail=function(b,c){var d,e,f,g=c.width&&c.height?'style="width:'+c.width+"px;height:"+c.height+'px;"':"",h=b.find("img"),i="src",j="",k=this._core.settings,l=function(a){e='<div class="owl-video-play-icon"></div>',d=k.lazyLoad?'<div class="owl-video-tn '+j+'" '+i+'="'+a+'"></div>':'<div class="owl-video-tn" style="opacity:1;background-image:url('+a+')"></div>',b.after(d),b.after(e)};return b.wrap('<div class="owl-video-wrapper"'+g+"></div>"),this._core.settings.lazyLoad&&(i="data-src",j="owl-lazy"),h.length?(l(h.attr(i)),h.remove(),!1):void("youtube"===c.type?(f="http://img.youtube.com/vi/"+c.id+"/hqdefault.jpg",l(f)):"vimeo"===c.type&&a.ajax({type:"GET",url:"http://vimeo.com/api/v2/video/"+c.id+".json",jsonp:"callback",dataType:"jsonp",success:function(a){f=a[0].thumbnail_large,l(f)}}))},d.prototype.stop=function(){this._core.trigger("stop",null,"video"),this._playing.find(".owl-video-frame").remove(),this._playing.removeClass("owl-video-playing"),this._playing=null},d.prototype.play=function(b){this._core.trigger("play",null,"video"),this._playing&&this.stop();var c,d,e=a(b.target||b.srcElement),f=e.closest("."+this._core.settings.itemClass),g=this._videos[f.attr("data-video")],h=g.width||"100%",i=g.height||this._core.$stage.height();"youtube"===g.type?c='<iframe width="'+h+'" height="'+i+'" src="http://www.youtube.com/embed/'+g.id+"?autoplay=1&v="+g.id+'" frameborder="0" allowfullscreen></iframe>':"vimeo"===g.type&&(c='<iframe src="http://player.vimeo.com/video/'+g.id+'?autoplay=1" width="'+h+'" height="'+i+'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'),f.addClass("owl-video-playing"),this._playing=f,d=a('<div style="height:'+i+"px; width:"+h+'px" class="owl-video-frame">'+c+"</div>"),e.after(d)},d.prototype.isInFullScreen=function(){var d=c.fullscreenElement||c.mozFullScreenElement||c.webkitFullscreenElement;return d&&a(d).parent().hasClass("owl-video-frame")&&(this._core.speed(0),this._fullscreen=!0),d&&this._fullscreen&&this._playing?!1:this._fullscreen?(this._fullscreen=!1,!1):this._playing&&this._core.state.orientation!==b.orientation?(this._core.state.orientation=b.orientation,!1):!0},d.prototype.destroy=function(){var a,b;this._core.$element.off("click.owl.video");for(a in this._handlers)this._core.$element.off(a,this._handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.Video=d}(window.Zepto||window.jQuery,window,document),function(a,b,c,d){var e=function(b){this.core=b,this.core.options=a.extend({},e.Defaults,this.core.options),this.swapping=!0,this.previous=d,this.next=d,this.handlers={"change.owl.carousel":a.proxy(function(a){"position"==a.property.name&&(this.previous=this.core.current(),this.next=a.property.value)},this),"drag.owl.carousel dragged.owl.carousel translated.owl.carousel":a.proxy(function(a){this.swapping="translated"==a.type},this),"translate.owl.carousel":a.proxy(function(){this.swapping&&(this.core.options.animateOut||this.core.options.animateIn)&&this.swap()},this)},this.core.$element.on(this.handlers)};e.Defaults={animateOut:!1,animateIn:!1},e.prototype.swap=function(){if(1===this.core.settings.items&&this.core.support3d){this.core.speed(0);var b,c=a.proxy(this.clear,this),d=this.core.$stage.children().eq(this.previous),e=this.core.$stage.children().eq(this.next),f=this.core.settings.animateIn,g=this.core.settings.animateOut;this.core.current()!==this.previous&&(g&&(b=this.core.coordinates(this.previous)-this.core.coordinates(this.next),d.css({left:b+"px"}).addClass("animated owl-animated-out").addClass(g).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",c)),f&&e.addClass("animated owl-animated-in").addClass(f).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",c))}},e.prototype.clear=function(b){a(b.target).css({left:""}).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings.animateIn).removeClass(this.core.settings.animateOut),this.core.transitionEnd()},e.prototype.destroy=function(){var a,b;for(a in this.handlers)this.core.$element.off(a,this.handlers[a]);for(b in Object.getOwnPropertyNames(this))"function"!=typeof this[b]&&(this[b]=null)},a.fn.owlCarousel.Constructor.Plugins.Animate=e}(window.Zepto||window.jQuery,window,document),function(a,b,c){var d=function(b){this.core=b,this.core.options=a.extend({},d.Defaults,this.core.options),this.handlers={"translated.owl.carousel refreshed.owl.carousel":a.proxy(function(){this.autoplay()
},this),"play.owl.autoplay":a.proxy(function(a,b,c){this.play(b,c)},this),"stop.owl.autoplay":a.proxy(function(){this.stop()},this),"mouseover.owl.autoplay":a.proxy(function(){this.core.settings.autoplayHoverPause&&this.pause()},this),"mouseleave.owl.autoplay":a.proxy(function(){this.core.settings.autoplayHoverPause&&this.autoplay()},this)},this.core.$element.on(this.handlers)};d.Defaults={autoplay:!1,autoplayTimeout:5e3,autoplayHoverPause:!1,autoplaySpeed:!1},d.prototype.autoplay=function(){this.core.settings.autoplay&&!this.core.state.videoPlay?(b.clearInterval(this.interval),this.interval=b.setInterval(a.proxy(function(){this.play()},this),this.core.settings.autoplayTimeout)):b.clearInterval(this.interval)},d.prototype.play=function(){return c.hidden===!0||this.core.state.isTouch||this.core.state.isScrolling||this.core.state.isSwiping||this.core.state.inMotion?void 0:this.core.settings.autoplay===!1?void b.clearInterval(this.interval):void this.core.next(this.core.settings.autoplaySpeed)},d.prototype.stop=function(){b.clearInterval(this.interval)},d.prototype.pause=function(){b.clearInterval(this.interval)},d.prototype.destroy=function(){var a,c;b.clearInterval(this.interval);for(a in this.handlers)this.core.$element.off(a,this.handlers[a]);for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)},a.fn.owlCarousel.Constructor.Plugins.autoplay=d}(window.Zepto||window.jQuery,window,document),function(a){"use strict";var b=function(c){this._core=c,this._initialized=!1,this._pages=[],this._controls={},this._templates=[],this.$element=this._core.$element,this._overrides={next:this._core.next,prev:this._core.prev,to:this._core.to},this._handlers={"prepared.owl.carousel":a.proxy(function(b){this._core.settings.dotsData&&this._templates.push(a(b.content).find("[data-dot]").andSelf("[data-dot]").attr("data-dot"))},this),"add.owl.carousel":a.proxy(function(b){this._core.settings.dotsData&&this._templates.splice(b.position,0,a(b.content).find("[data-dot]").andSelf("[data-dot]").attr("data-dot"))},this),"remove.owl.carousel prepared.owl.carousel":a.proxy(function(a){this._core.settings.dotsData&&this._templates.splice(a.position,1)},this),"change.owl.carousel":a.proxy(function(a){if("position"==a.property.name&&!this._core.state.revert&&!this._core.settings.loop&&this._core.settings.navRewind){var b=this._core.current(),c=this._core.maximum(),d=this._core.minimum();a.data=a.property.value>c?b>=c?d:c:a.property.value<d?c:a.property.value}},this),"changed.owl.carousel":a.proxy(function(a){"position"==a.property.name&&this.draw()},this),"refreshed.owl.carousel":a.proxy(function(){this._initialized||(this.initialize(),this._initialized=!0),this._core.trigger("refresh",null,"navigation"),this.update(),this.draw(),this._core.trigger("refreshed",null,"navigation")},this)},this._core.options=a.extend({},b.Defaults,this._core.options),this.$element.on(this._handlers)};b.Defaults={nav:!1,navRewind:!0,navText:["prev","next"],navSpeed:!1,navElement:"div",navContainer:!1,navContainerClass:"owl-nav",navClass:["owl-prev","owl-next"],slideBy:1,dotClass:"owl-dot",dotsClass:"owl-dots",dots:!0,dotsEach:!1,dotData:!1,dotsSpeed:!1,dotsContainer:!1,controlsClass:"owl-controls"},b.prototype.initialize=function(){var b,c,d=this._core.settings;d.dotsData||(this._templates=[a("<div>").addClass(d.dotClass).append(a("<span>")).prop("outerHTML")]),d.navContainer&&d.dotsContainer||(this._controls.$container=a("<div>").addClass(d.controlsClass).appendTo(this.$element)),this._controls.$indicators=d.dotsContainer?a(d.dotsContainer):a("<div>").hide().addClass(d.dotsClass).appendTo(this._controls.$container),this._controls.$indicators.on("click","div",a.proxy(function(b){var c=a(b.target).parent().is(this._controls.$indicators)?a(b.target).index():a(b.target).parent().index();b.preventDefault(),this.to(c,d.dotsSpeed)},this)),b=d.navContainer?a(d.navContainer):a("<div>").addClass(d.navContainerClass).prependTo(this._controls.$container),this._controls.$next=a("<"+d.navElement+">"),this._controls.$previous=this._controls.$next.clone(),this._controls.$previous.addClass(d.navClass[0]).html(d.navText[0]).hide().prependTo(b).on("click",a.proxy(function(){this.prev(d.navSpeed)},this)),this._controls.$next.addClass(d.navClass[1]).html(d.navText[1]).hide().appendTo(b).on("click",a.proxy(function(){this.next(d.navSpeed)},this));for(c in this._overrides)this._core[c]=a.proxy(this[c],this)},b.prototype.destroy=function(){var a,b,c,d;for(a in this._handlers)this.$element.off(a,this._handlers[a]);for(b in this._controls)this._controls[b].remove();for(d in this.overides)this._core[d]=this._overrides[d];for(c in Object.getOwnPropertyNames(this))"function"!=typeof this[c]&&(this[c]=null)},b.prototype.update=function(){var a,b,c,d=this._core.settings,e=this._core.clones().length/2,f=e+this._core.items().length,g=d.center||d.autoWidth||d.dotData?1:d.dotsEach||d.items;if("page"!==d.slideBy&&(d.slideBy=Math.min(d.slideBy,d.items)),d.dots||"page"==d.slideBy)for(this._pages=[],a=e,b=0,c=0;f>a;a++)(b>=g||0===b)&&(this._pages.push({start:a-e,end:a-e+g-1}),b=0,++c),b+=this._core.mergers(this._core.relative(a))},b.prototype.draw=function(){var b,c,d="",e=this._core.settings,f=(this._core.$stage.children(),this._core.relative(this._core.current()));if(!e.nav||e.loop||e.navRewind||(this._controls.$previous.toggleClass("disabled",0>=f),this._controls.$next.toggleClass("disabled",f>=this._core.maximum())),this._controls.$previous.toggle(e.nav),this._controls.$next.toggle(e.nav),e.dots){if(b=this._pages.length-this._controls.$indicators.children().length,e.dotData&&0!==b){for(c=0;c<this._controls.$indicators.children().length;c++)d+=this._templates[this._core.relative(c)];this._controls.$indicators.html(d)}else b>0?(d=new Array(b+1).join(this._templates[0]),this._controls.$indicators.append(d)):0>b&&this._controls.$indicators.children().slice(b).remove();this._controls.$indicators.find(".active").removeClass("active"),this._controls.$indicators.children().eq(a.inArray(this.current(),this._pages)).addClass("active")}this._controls.$indicators.toggle(e.dots)},b.prototype.onTrigger=function(b){var c=this._core.settings;b.page={index:a.inArray(this.current(),this._pages),count:this._pages.length,size:c&&(c.center||c.autoWidth||c.dotData?1:c.dotsEach||c.items)}},b.prototype.current=function(){var b=this._core.relative(this._core.current());return a.grep(this._pages,function(a){return a.start<=b&&a.end>=b}).pop()},b.prototype.getPosition=function(b){var c,d,e=this._core.settings;return"page"==e.slideBy?(c=a.inArray(this.current(),this._pages),d=this._pages.length,b?++c:--c,c=this._pages[(c%d+d)%d].start):(c=this._core.relative(this._core.current()),d=this._core.items().length,b?c+=e.slideBy:c-=e.slideBy),c},b.prototype.next=function(b){a.proxy(this._overrides.to,this._core)(this.getPosition(!0),b)},b.prototype.prev=function(b){a.proxy(this._overrides.to,this._core)(this.getPosition(!1),b)},b.prototype.to=function(b,c,d){var e;d?a.proxy(this._overrides.to,this._core)(b,c):(e=this._pages.length,a.proxy(this._overrides.to,this._core)(this._pages[(b%e+e)%e].start,c))},a.fn.owlCarousel.Constructor.Plugins.Navigation=b}(window.Zepto||window.jQuery,window,document),function(a,b){"use strict";var c=function(d){this._core=d,this._hashes={},this.$element=this._core.$element,this._handlers={"initialized.owl.carousel":a.proxy(function(){"URLHash"==this._core.settings.startPosition&&a(b).trigger("hashchange.owl.navigation")},this),"prepared.owl.carousel":a.proxy(function(b){var c=a(b.content).find("[data-hash]").andSelf("[data-hash]").attr("data-hash");this._hashes[c]=b.content},this)},this._core.options=a.extend({},c.Defaults,this._core.options),this.$element.on(this._handlers),a(b).on("hashchange.owl.navigation",a.proxy(function(){var a=b.location.hash.substring(1),c=this._core.$stage.children(),d=this._hashes[a]&&c.index(this._hashes[a])||0;return a?void this._core.to(d,!1,!0):!1},this))};c.Defaults={URLhashListener:!1},c.prototype.destroy=function(){var c,d;a(b).off("hashchange.owl.navigation");for(c in this._handlers)this._core.$element.off(c,this._handlers[c]);for(d in Object.getOwnPropertyNames(this))"function"!=typeof this[d]&&(this[d]=null)},a.fn.owlCarousel.Constructor.Plugins.Hash=c}(window.Zepto||window.jQuery,window,document);
/*!
 * Flickity PACKAGED v1.1.1
 * Touch, responsive, flickable galleries
 *
 * Licensed GPLv3 for open source use
 * or Flickity Commercial License for commercial use
 *
 * http://flickity.metafizzy.co
 * Copyright 2015 Metafizzy
 */

!function(t){function e(){}function i(t){function i(e){e.prototype.option||(e.prototype.option=function(e){t.isPlainObject(e)&&(this.options=t.extend(!0,this.options,e))})}function o(e,i){t.fn[e]=function(o){if("string"==typeof o){for(var s=n.call(arguments,1),a=0,l=this.length;l>a;a++){var c=this[a],h=t.data(c,e);if(h)if(t.isFunction(h[o])&&"_"!==o.charAt(0)){var p=h[o].apply(h,s);if(void 0!==p)return p}else r("no such method '"+o+"' for "+e+" instance");else r("cannot call methods on "+e+" prior to initialization; attempted to call '"+o+"'")}return this}return this.each(function(){var n=t.data(this,e);n?(n.option(o),n._init()):(n=new i(this,o),t.data(this,e,n))})}}if(t){var r="undefined"==typeof console?e:function(t){console.error(t)};return t.bridget=function(t,e){i(e),o(t,e)},t.bridget}}var n=Array.prototype.slice;"function"==typeof define&&define.amd?define("jquery-bridget/jquery.bridget",["jquery"],i):i("object"==typeof exports?require("jquery"):t.jQuery)}(window),function(t){function e(t){return new RegExp("(^|\\s+)"+t+"(\\s+|$)")}function i(t,e){var i=n(t,e)?r:o;i(t,e)}var n,o,r;"classList"in document.documentElement?(n=function(t,e){return t.classList.contains(e)},o=function(t,e){t.classList.add(e)},r=function(t,e){t.classList.remove(e)}):(n=function(t,i){return e(i).test(t.className)},o=function(t,e){n(t,e)||(t.className=t.className+" "+e)},r=function(t,i){t.className=t.className.replace(e(i)," ")});var s={hasClass:n,addClass:o,removeClass:r,toggleClass:i,has:n,add:o,remove:r,toggle:i};"function"==typeof define&&define.amd?define("classie/classie",s):"object"==typeof exports?module.exports=s:t.classie=s}(window),function(){function t(){}function e(t,e){for(var i=t.length;i--;)if(t[i].listener===e)return i;return-1}function i(t){return function(){return this[t].apply(this,arguments)}}var n=t.prototype,o=this,r=o.EventEmitter;n.getListeners=function(t){var e,i,n=this._getEvents();if(t instanceof RegExp){e={};for(i in n)n.hasOwnProperty(i)&&t.test(i)&&(e[i]=n[i])}else e=n[t]||(n[t]=[]);return e},n.flattenListeners=function(t){var e,i=[];for(e=0;e<t.length;e+=1)i.push(t[e].listener);return i},n.getListenersAsObject=function(t){var e,i=this.getListeners(t);return i instanceof Array&&(e={},e[t]=i),e||i},n.addListener=function(t,i){var n,o=this.getListenersAsObject(t),r="object"==typeof i;for(n in o)o.hasOwnProperty(n)&&-1===e(o[n],i)&&o[n].push(r?i:{listener:i,once:!1});return this},n.on=i("addListener"),n.addOnceListener=function(t,e){return this.addListener(t,{listener:e,once:!0})},n.once=i("addOnceListener"),n.defineEvent=function(t){return this.getListeners(t),this},n.defineEvents=function(t){for(var e=0;e<t.length;e+=1)this.defineEvent(t[e]);return this},n.removeListener=function(t,i){var n,o,r=this.getListenersAsObject(t);for(o in r)r.hasOwnProperty(o)&&(n=e(r[o],i),-1!==n&&r[o].splice(n,1));return this},n.off=i("removeListener"),n.addListeners=function(t,e){return this.manipulateListeners(!1,t,e)},n.removeListeners=function(t,e){return this.manipulateListeners(!0,t,e)},n.manipulateListeners=function(t,e,i){var n,o,r=t?this.removeListener:this.addListener,s=t?this.removeListeners:this.addListeners;if("object"!=typeof e||e instanceof RegExp)for(n=i.length;n--;)r.call(this,e,i[n]);else for(n in e)e.hasOwnProperty(n)&&(o=e[n])&&("function"==typeof o?r.call(this,n,o):s.call(this,n,o));return this},n.removeEvent=function(t){var e,i=typeof t,n=this._getEvents();if("string"===i)delete n[t];else if(t instanceof RegExp)for(e in n)n.hasOwnProperty(e)&&t.test(e)&&delete n[e];else delete this._events;return this},n.removeAllListeners=i("removeEvent"),n.emitEvent=function(t,e){var i,n,o,r,s=this.getListenersAsObject(t);for(o in s)if(s.hasOwnProperty(o))for(n=s[o].length;n--;)i=s[o][n],i.once===!0&&this.removeListener(t,i.listener),r=i.listener.apply(this,e||[]),r===this._getOnceReturnValue()&&this.removeListener(t,i.listener);return this},n.trigger=i("emitEvent"),n.emit=function(t){var e=Array.prototype.slice.call(arguments,1);return this.emitEvent(t,e)},n.setOnceReturnValue=function(t){return this._onceReturnValue=t,this},n._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},n._getEvents=function(){return this._events||(this._events={})},t.noConflict=function(){return o.EventEmitter=r,t},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return t}):"object"==typeof module&&module.exports?module.exports=t:o.EventEmitter=t}.call(this),function(t){function e(e){var i=t.event;return i.target=i.target||i.srcElement||e,i}var i=document.documentElement,n=function(){};i.addEventListener?n=function(t,e,i){t.addEventListener(e,i,!1)}:i.attachEvent&&(n=function(t,i,n){t[i+n]=n.handleEvent?function(){var i=e(t);n.handleEvent.call(n,i)}:function(){var i=e(t);n.call(t,i)},t.attachEvent("on"+i,t[i+n])});var o=function(){};i.removeEventListener?o=function(t,e,i){t.removeEventListener(e,i,!1)}:i.detachEvent&&(o=function(t,e,i){t.detachEvent("on"+e,t[e+i]);try{delete t[e+i]}catch(n){t[e+i]=void 0}});var r={bind:n,unbind:o};"function"==typeof define&&define.amd?define("eventie/eventie",r):"object"==typeof exports?module.exports=r:t.eventie=r}(window),function(t){function e(t){if(t){if("string"==typeof n[t])return t;t=t.charAt(0).toUpperCase()+t.slice(1);for(var e,o=0,r=i.length;r>o;o++)if(e=i[o]+t,"string"==typeof n[e])return e}}var i="Webkit Moz ms Ms O".split(" "),n=document.documentElement.style;"function"==typeof define&&define.amd?define("get-style-property/get-style-property",[],function(){return e}):"object"==typeof exports?module.exports=e:t.getStyleProperty=e}(window),function(t){function e(t){var e=parseFloat(t),i=-1===t.indexOf("%")&&!isNaN(e);return i&&e}function i(){}function n(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0,i=s.length;i>e;e++){var n=s[e];t[n]=0}return t}function o(i){function o(){if(!d){d=!0;var n=t.getComputedStyle;if(c=function(){var t=n?function(t){return n(t,null)}:function(t){return t.currentStyle};return function(e){var i=t(e);return i||r("Style returned "+i+". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"),i}}(),h=i("boxSizing")){var o=document.createElement("div");o.style.width="200px",o.style.padding="1px 2px 3px 4px",o.style.borderStyle="solid",o.style.borderWidth="1px 2px 3px 4px",o.style[h]="border-box";var s=document.body||document.documentElement;s.appendChild(o);var a=c(o);p=200===e(a.width),s.removeChild(o)}}}function a(t){if(o(),"string"==typeof t&&(t=document.querySelector(t)),t&&"object"==typeof t&&t.nodeType){var i=c(t);if("none"===i.display)return n();var r={};r.width=t.offsetWidth,r.height=t.offsetHeight;for(var a=r.isBorderBox=!(!h||!i[h]||"border-box"!==i[h]),d=0,u=s.length;u>d;d++){var f=s[d],v=i[f];v=l(t,v);var y=parseFloat(v);r[f]=isNaN(y)?0:y}var g=r.paddingLeft+r.paddingRight,m=r.paddingTop+r.paddingBottom,b=r.marginLeft+r.marginRight,S=r.marginTop+r.marginBottom,x=r.borderLeftWidth+r.borderRightWidth,w=r.borderTopWidth+r.borderBottomWidth,C=a&&p,E=e(i.width);E!==!1&&(r.width=E+(C?0:g+x));var P=e(i.height);return P!==!1&&(r.height=P+(C?0:m+w)),r.innerWidth=r.width-(g+x),r.innerHeight=r.height-(m+w),r.outerWidth=r.width+b,r.outerHeight=r.height+S,r}}function l(e,i){if(t.getComputedStyle||-1===i.indexOf("%"))return i;var n=e.style,o=n.left,r=e.runtimeStyle,s=r&&r.left;return s&&(r.left=e.currentStyle.left),n.left=i,i=n.pixelLeft,n.left=o,s&&(r.left=s),i}var c,h,p,d=!1;return a}var r="undefined"==typeof console?i:function(t){console.error(t)},s=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"];"function"==typeof define&&define.amd?define("get-size/get-size",["get-style-property/get-style-property"],o):"object"==typeof exports?module.exports=o(require("desandro-get-style-property")):t.getSize=o(t.getStyleProperty)}(window),function(t){function e(t){"function"==typeof t&&(e.isReady?t():s.push(t))}function i(t){var i="readystatechange"===t.type&&"complete"!==r.readyState;e.isReady||i||n()}function n(){e.isReady=!0;for(var t=0,i=s.length;i>t;t++){var n=s[t];n()}}function o(o){return"complete"===r.readyState?n():(o.bind(r,"DOMContentLoaded",i),o.bind(r,"readystatechange",i),o.bind(t,"load",i)),e}var r=t.document,s=[];e.isReady=!1,"function"==typeof define&&define.amd?define("doc-ready/doc-ready",["eventie/eventie"],o):"object"==typeof exports?module.exports=o(require("eventie")):t.docReady=o(t.eventie)}(window),function(t){function e(t,e){return t[s](e)}function i(t){if(!t.parentNode){var e=document.createDocumentFragment();e.appendChild(t)}}function n(t,e){i(t);for(var n=t.parentNode.querySelectorAll(e),o=0,r=n.length;r>o;o++)if(n[o]===t)return!0;return!1}function o(t,n){return i(t),e(t,n)}var r,s=function(){if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0,n=e.length;n>i;i++){var o=e[i],r=o+"MatchesSelector";if(t[r])return r}}();if(s){var a=document.createElement("div"),l=e(a,"div");r=l?e:o}else r=n;"function"==typeof define&&define.amd?define("matches-selector/matches-selector",[],function(){return r}):"object"==typeof exports?module.exports=r:window.matchesSelector=r}(Element.prototype),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["doc-ready/doc-ready","matches-selector/matches-selector"],function(i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(t,require("doc-ready"),require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.docReady,t.matchesSelector)}(window,function(t,e,i){var n={};n.extend=function(t,e){for(var i in e)t[i]=e[i];return t},n.modulo=function(t,e){return(t%e+e)%e};var o=Object.prototype.toString;n.isArray=function(t){return"[object Array]"==o.call(t)},n.makeArray=function(t){var e=[];if(n.isArray(t))e=t;else if(t&&"number"==typeof t.length)for(var i=0,o=t.length;o>i;i++)e.push(t[i]);else e.push(t);return e},n.indexOf=Array.prototype.indexOf?function(t,e){return t.indexOf(e)}:function(t,e){for(var i=0,n=t.length;n>i;i++)if(t[i]===e)return i;return-1},n.removeFrom=function(t,e){var i=n.indexOf(t,e);-1!=i&&t.splice(i,1)},n.isElement="function"==typeof HTMLElement||"object"==typeof HTMLElement?function(t){return t instanceof HTMLElement}:function(t){return t&&"object"==typeof t&&1==t.nodeType&&"string"==typeof t.nodeName},n.setText=function(){function t(t,i){e=e||(void 0!==document.documentElement.textContent?"textContent":"innerText"),t[e]=i}var e;return t}(),n.getParent=function(t,e){for(;t!=document.body;)if(t=t.parentNode,i(t,e))return t},n.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},n.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},n.filterFindElements=function(t,e){t=n.makeArray(t);for(var o=[],r=0,s=t.length;s>r;r++){var a=t[r];if(n.isElement(a))if(e){i(a,e)&&o.push(a);for(var l=a.querySelectorAll(e),c=0,h=l.length;h>c;c++)o.push(l[c])}else o.push(a)}return o},n.debounceMethod=function(t,e,i){var n=t.prototype[e],o=e+"Timeout";t.prototype[e]=function(){var t=this[o];t&&clearTimeout(t);var e=arguments,r=this;this[o]=setTimeout(function(){n.apply(r,e),delete r[o]},i||100)}},n.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var r=t.console;return n.htmlInit=function(i,o){e(function(){for(var e=n.toDashed(o),s=document.querySelectorAll(".js-"+e),a="data-"+e+"-options",l=0,c=s.length;c>l;l++){var h,p=s[l],d=p.getAttribute(a);try{h=d&&JSON.parse(d)}catch(u){r&&r.error("Error parsing "+a+" on "+p.nodeName.toLowerCase()+(p.id?"#"+p.id:"")+": "+u);continue}var f=new i(p,h),v=t.jQuery;v&&v.data(p,o,f)}})},n}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/cell",["get-size/get-size"],function(i){return e(t,i)}):"object"==typeof exports?module.exports=e(t,require("get-size")):(t.Flickity=t.Flickity||{},t.Flickity.Cell=e(t,t.getSize))}(window,function(t,e){function i(t,e){this.element=t,this.parent=e,this.create()}var n="attachEvent"in t;return i.prototype.create=function(){this.element.style.position="absolute",n&&this.element.setAttribute("unselectable","on"),this.x=0,this.shift=0},i.prototype.destroy=function(){this.element.style.position="";var t=this.parent.originSide;this.element.style[t]=""},i.prototype.getSize=function(){this.size=e(this.element)},i.prototype.setPosition=function(t){this.x=t,this.setDefaultTarget(),this.renderPosition(t)},i.prototype.setDefaultTarget=function(){var t="left"==this.parent.originSide?"marginLeft":"marginRight";this.target=this.x+this.size[t]+this.size.width*this.parent.cellAlign},i.prototype.renderPosition=function(t){var e=this.parent.originSide;this.element.style[e]=this.parent.getPositionValue(t)},i.prototype.wrapShift=function(t){this.shift=t,this.renderPosition(this.x+this.parent.slideableWidth*t)},i.prototype.remove=function(){this.element.parentNode.removeChild(this.element)},i}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/animate",["get-style-property/get-style-property","fizzy-ui-utils/utils"],function(i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(t,require("desandro-get-style-property"),require("fizzy-ui-utils")):(t.Flickity=t.Flickity||{},t.Flickity.animatePrototype=e(t,t.getStyleProperty,t.fizzyUIUtils))}(window,function(t,e,i){for(var n,o=0,r="webkit moz ms o".split(" "),s=t.requestAnimationFrame,a=t.cancelAnimationFrame,l=0;l<r.length&&(!s||!a);l++)n=r[l],s=s||t[n+"RequestAnimationFrame"],a=a||t[n+"CancelAnimationFrame"]||t[n+"CancelRequestAnimationFrame"];s&&a||(s=function(e){var i=(new Date).getTime(),n=Math.max(0,16-(i-o)),r=t.setTimeout(function(){e(i+n)},n);return o=i+n,r},a=function(e){t.clearTimeout(e)});var c={};c.startAnimation=function(){this.isAnimating||(this.isAnimating=!0,this.restingFrames=0,this.animate())},c.animate=function(){this.applyDragForce(),this.applySelectedAttraction();var t=this.x;if(this.integratePhysics(),this.positionSlider(),this.settle(t),this.isAnimating){var e=this;s(function(){e.animate()})}};var h=e("transform"),p=!!e("perspective");return c.positionSlider=function(){var t=this.x;this.options.wrapAround&&this.cells.length>1&&(t=i.modulo(t,this.slideableWidth),t-=this.slideableWidth,this.shiftWrapCells(t)),t+=this.cursorPosition,t=this.options.rightToLeft&&h?-t:t;var e=this.getPositionValue(t);h?this.slider.style[h]=p&&this.isAnimating?"translate3d("+e+",0,0)":"translateX("+e+")":this.slider.style[this.originSide]=e},c.positionSliderAtSelected=function(){if(this.cells.length){var t=this.cells[this.selectedIndex];this.x=-t.target,this.positionSlider()}},c.getPositionValue=function(t){return this.options.percentPosition?.01*Math.round(t/this.size.innerWidth*1e4)+"%":Math.round(t)+"px"},c.settle=function(t){this.isPointerDown||Math.round(100*this.x)!=Math.round(100*t)||this.restingFrames++,this.restingFrames>2&&(this.isAnimating=!1,delete this.isFreeScrolling,p&&this.positionSlider(),this.dispatchEvent("settle"))},c.shiftWrapCells=function(t){var e=this.cursorPosition+t;this._shiftCells(this.beforeShiftCells,e,-1);var i=this.size.innerWidth-(t+this.slideableWidth+this.cursorPosition);this._shiftCells(this.afterShiftCells,i,1)},c._shiftCells=function(t,e,i){for(var n=0,o=t.length;o>n;n++){var r=t[n],s=e>0?i:0;r.wrapShift(s),e-=r.size.outerWidth}},c._unshiftCells=function(t){if(t&&t.length)for(var e=0,i=t.length;i>e;e++)t[e].wrapShift(0)},c.integratePhysics=function(){this.velocity+=this.accel,this.x+=this.velocity,this.velocity*=this.getFrictionFactor(),this.accel=0},c.applyForce=function(t){this.accel+=t},c.getFrictionFactor=function(){return 1-this.options[this.isFreeScrolling?"freeScrollFriction":"friction"]},c.getRestingPosition=function(){return this.x+this.velocity/(1-this.getFrictionFactor())},c.applyDragForce=function(){if(this.isPointerDown){var t=this.dragX-this.x,e=t-this.velocity;this.applyForce(e)}},c.applySelectedAttraction=function(){var t=this.cells.length;if(!this.isPointerDown&&!this.isFreeScrolling&&t){var e=this.cells[this.selectedIndex],i=this.options.wrapAround&&t>1?this.slideableWidth*Math.floor(this.selectedIndex/t):0,n=-1*(e.target+i)-this.x,o=n*this.options.selectedAttraction;this.applyForce(o)}},c}),function(t,e){if("function"==typeof define&&define.amd)define("flickity/js/flickity",["classie/classie","eventEmitter/EventEmitter","eventie/eventie","get-size/get-size","fizzy-ui-utils/utils","./cell","./animate"],function(i,n,o,r,s,a,l){return e(t,i,n,o,r,s,a,l)});else if("object"==typeof exports)module.exports=e(t,require("desandro-classie"),require("wolfy87-eventemitter"),require("eventie"),require("get-size"),require("fizzy-ui-utils"),require("./cell"),require("./animate"));else{var i=t.Flickity;t.Flickity=e(t,t.classie,t.EventEmitter,t.eventie,t.getSize,t.fizzyUIUtils,i.Cell,i.animatePrototype)}}(window,function(t,e,i,n,o,r,s,a){function l(t,e){for(t=r.makeArray(t);t.length;)e.appendChild(t.shift())}function c(t,e){var i=r.getQueryElement(t);return i?(this.element=i,h&&(this.$element=h(this.element)),this.options=r.extend({},this.constructor.defaults),this.option(e),void this._create()):void(d&&d.error("Bad element for Flickity: "+(i||t)))}var h=t.jQuery,p=t.getComputedStyle,d=t.console,u=0,f={};c.defaults={accessibility:!0,cellAlign:"center",freeScrollFriction:.075,friction:.28,percentPosition:!0,resize:!0,selectedAttraction:.025,setGallerySize:!0},c.createMethods=[],r.extend(c.prototype,i.prototype),c.prototype._create=function(){var e=this.guid=++u;this.element.flickityGUID=e,f[e]=this,this.selectedIndex=this.options.initialIndex||0,this.restingFrames=0,this.x=0,this.velocity=0,this.accel=0,this.originSide=this.options.rightToLeft?"right":"left",this.viewport=document.createElement("div"),this.viewport.className="flickity-viewport",c.setUnselectable(this.viewport),this._createSlider(),(this.options.resize||this.options.watchCSS)&&(n.bind(t,"resize",this),this.isResizeBound=!0);for(var i=0,o=c.createMethods.length;o>i;i++){var r=c.createMethods[i];this[r]()}this.options.watchCSS?this.watchCSS():this.activate()},c.prototype.option=function(t){r.extend(this.options,t)},c.prototype.activate=function(){if(!this.isActive){this.isActive=!0,e.add(this.element,"flickity-enabled"),this.options.rightToLeft&&e.add(this.element,"flickity-rtl"),this.getSize();var t=this._filterFindCellElements(this.element.children);l(t,this.slider),this.viewport.appendChild(this.slider),this.element.appendChild(this.viewport),this.reloadCells(),this.options.accessibility&&(this.element.tabIndex=0,n.bind(this.element,"keydown",this)),this.emit("activate"),this.positionSliderAtSelected(),this.select(this.selectedIndex)}},c.prototype._createSlider=function(){var t=document.createElement("div");t.className="flickity-slider",t.style[this.originSide]=0,this.slider=t},c.prototype._filterFindCellElements=function(t){return r.filterFindElements(t,this.options.cellSelector)},c.prototype.reloadCells=function(){this.cells=this._makeCells(this.slider.children),this.positionCells(),this._getWrapShiftCells(),this.setGallerySize()},c.prototype._makeCells=function(t){for(var e=this._filterFindCellElements(t),i=[],n=0,o=e.length;o>n;n++){var r=e[n],a=new s(r,this);i.push(a)}return i},c.prototype.getLastCell=function(){return this.cells[this.cells.length-1]},c.prototype.positionCells=function(){this._sizeCells(this.cells),this._positionCells(0)},c.prototype._positionCells=function(t){t=t||0,this.maxCellHeight=t?this.maxCellHeight||0:0;var e=0;if(t>0){var i=this.cells[t-1];e=i.x+i.size.outerWidth}for(var n,o=this.cells.length,r=t;o>r;r++)n=this.cells[r],n.setPosition(e),e+=n.size.outerWidth,this.maxCellHeight=Math.max(n.size.outerHeight,this.maxCellHeight);this.slideableWidth=e,this._containCells()},c.prototype._sizeCells=function(t){for(var e=0,i=t.length;i>e;e++){var n=t[e];n.getSize()}},c.prototype._init=c.prototype.reposition=function(){this.positionCells(),this.positionSliderAtSelected()},c.prototype.getSize=function(){this.size=o(this.element),this.setCellAlign(),this.cursorPosition=this.size.innerWidth*this.cellAlign};var v={center:{left:.5,right:.5},left:{left:0,right:1},right:{right:0,left:1}};c.prototype.setCellAlign=function(){var t=v[this.options.cellAlign];this.cellAlign=t?t[this.originSide]:this.options.cellAlign},c.prototype.setGallerySize=function(){this.options.setGallerySize&&(this.viewport.style.height=this.maxCellHeight+"px")},c.prototype._getWrapShiftCells=function(){if(this.options.wrapAround){this._unshiftCells(this.beforeShiftCells),this._unshiftCells(this.afterShiftCells);var t=this.cursorPosition,e=this.cells.length-1;this.beforeShiftCells=this._getGapCells(t,e,-1),t=this.size.innerWidth-this.cursorPosition,this.afterShiftCells=this._getGapCells(t,0,1)}},c.prototype._getGapCells=function(t,e,i){for(var n=[];t>0;){var o=this.cells[e];if(!o)break;n.push(o),e+=i,t-=o.size.outerWidth}return n},c.prototype._containCells=function(){if(this.options.contain&&!this.options.wrapAround&&this.cells.length)for(var t=this.options.rightToLeft?"marginRight":"marginLeft",e=this.options.rightToLeft?"marginLeft":"marginRight",i=this.cells[0].size[t],n=this.getLastCell(),o=this.slideableWidth-n.size[e],r=o-this.size.innerWidth*(1-this.cellAlign),s=o<this.size.innerWidth,a=0,l=this.cells.length;l>a;a++){var c=this.cells[a];c.setDefaultTarget(),s?c.target=o*this.cellAlign:(c.target=Math.max(c.target,this.cursorPosition+i),c.target=Math.min(c.target,r))}},c.prototype.dispatchEvent=function(t,e,i){var n=[e].concat(i);if(this.emitEvent(t,n),h&&this.$element)if(e){var o=h.Event(e);o.type=t,this.$element.trigger(o,i)}else this.$element.trigger(t,i)},c.prototype.select=function(t,e){if(this.isActive){var i=this.cells.length;this.options.wrapAround&&i>1&&(0>t?this.x-=this.slideableWidth:t>=i&&(this.x+=this.slideableWidth)),(this.options.wrapAround||e)&&(t=r.modulo(t,i)),this.cells[t]&&(this.selectedIndex=t,this.setSelectedCell(),this.startAnimation(),this.dispatchEvent("cellSelect"))}},c.prototype.previous=function(t){this.select(this.selectedIndex-1,t)},c.prototype.next=function(t){this.select(this.selectedIndex+1,t)},c.prototype.setSelectedCell=function(){this._removeSelectedCellClass(),this.selectedCell=this.cells[this.selectedIndex],this.selectedElement=this.selectedCell.element,e.add(this.selectedElement,"is-selected")},c.prototype._removeSelectedCellClass=function(){this.selectedCell&&e.remove(this.selectedCell.element,"is-selected")},c.prototype.getCell=function(t){for(var e=0,i=this.cells.length;i>e;e++){var n=this.cells[e];if(n.element==t)return n}},c.prototype.getCells=function(t){t=r.makeArray(t);for(var e=[],i=0,n=t.length;n>i;i++){var o=t[i],s=this.getCell(o);s&&e.push(s)}return e},c.prototype.getCellElements=function(){for(var t=[],e=0,i=this.cells.length;i>e;e++)t.push(this.cells[e].element);return t},c.prototype.getParentCell=function(t){var e=this.getCell(t);return e?e:(t=r.getParent(t,".flickity-slider > *"),this.getCell(t))},c.prototype.getAdjacentCellElements=function(t,e){if(!t)return[this.selectedElement];e=void 0===e?this.selectedIndex:e;var i=this.cells.length;if(1+2*t>=i)return this.getCellElements();for(var n=[],o=e-t;e+t>=o;o++){var s=this.options.wrapAround?r.modulo(o,i):o,a=this.cells[s];a&&n.push(a.element)}return n},c.prototype.uiChange=function(){this.emit("uiChange")},c.prototype.childUIPointerDown=function(t){this.emitEvent("childUIPointerDown",[t])},c.prototype.onresize=function(){this.watchCSS(),this.resize()},r.debounceMethod(c,"onresize",150),c.prototype.resize=function(){this.isActive&&(this.getSize(),this.options.wrapAround&&(this.x=r.modulo(this.x,this.slideableWidth)),this.positionCells(),this._getWrapShiftCells(),this.setGallerySize(),this.positionSliderAtSelected())};var y=c.supportsConditionalCSS=function(){var t;return function(){if(void 0!==t)return t;if(!p)return void(t=!1);var e=document.createElement("style"),i=document.createTextNode('body:after { content: "foo"; display: none; }');e.appendChild(i),document.head.appendChild(e);var n=p(document.body,":after").content;return t=-1!=n.indexOf("foo"),document.head.removeChild(e),t}}();c.prototype.watchCSS=function(){var t=this.options.watchCSS;if(t){var e=y();if(!e){var i="fallbackOn"==t?"activate":"deactivate";return void this[i]()}var n=p(this.element,":after").content;-1!=n.indexOf("flickity")?this.activate():this.deactivate()}},c.prototype.onkeydown=function(t){if(this.options.accessibility&&(!document.activeElement||document.activeElement==this.element))if(37==t.keyCode){var e=this.options.rightToLeft?"next":"previous";this.uiChange(),this[e]()}else if(39==t.keyCode){var i=this.options.rightToLeft?"previous":"next";this.uiChange(),this[i]()}},c.prototype.deactivate=function(){if(this.isActive){e.remove(this.element,"flickity-enabled"),e.remove(this.element,"flickity-rtl");for(var t=0,i=this.cells.length;i>t;t++){var o=this.cells[t];o.destroy()}this._removeSelectedCellClass(),this.element.removeChild(this.viewport),l(this.slider.children,this.element),this.options.accessibility&&(this.element.removeAttribute("tabIndex"),n.unbind(this.element,"keydown",this)),this.isActive=!1,this.emit("deactivate")}},c.prototype.destroy=function(){this.deactivate(),this.isResizeBound&&n.unbind(t,"resize",this),this.emit("destroy"),h&&this.$element&&h.removeData(this.element,"flickity"),delete this.element.flickityGUID,delete f[this.guid]},r.extend(c.prototype,a);var g="attachEvent"in t;return c.setUnselectable=function(t){g&&t.setAttribute("unselectable","on")},c.data=function(t){t=r.getQueryElement(t);var e=t&&t.flickityGUID;return e&&f[e]},r.htmlInit(c,"flickity"),h&&h.bridget&&h.bridget("flickity",c),c.Cell=s,c}),function(t,e){"function"==typeof define&&define.amd?define("unipointer/unipointer",["eventEmitter/EventEmitter","eventie/eventie"],function(i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(t,require("wolfy87-eventemitter"),require("eventie")):t.Unipointer=e(t,t.EventEmitter,t.eventie)}(window,function(t,e,i){function n(){}function o(){}o.prototype=new e,o.prototype.bindStartEvent=function(t){this._bindStartEvent(t,!0)},o.prototype.unbindStartEvent=function(t){this._bindStartEvent(t,!1)},o.prototype._bindStartEvent=function(e,n){n=void 0===n?!0:!!n;var o=n?"bind":"unbind";t.navigator.pointerEnabled?i[o](e,"pointerdown",this):t.navigator.msPointerEnabled?i[o](e,"MSPointerDown",this):(i[o](e,"mousedown",this),i[o](e,"touchstart",this))},o.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},o.prototype.getTouch=function(t){for(var e=0,i=t.length;i>e;e++){var n=t[e];if(n.identifier==this.pointerIdentifier)return n}},o.prototype.onmousedown=function(t){var e=t.button;e&&0!==e&&1!==e||this._pointerDown(t,t)},o.prototype.ontouchstart=function(t){this._pointerDown(t,t.changedTouches[0])},o.prototype.onMSPointerDown=o.prototype.onpointerdown=function(t){this._pointerDown(t,t)},o.prototype._pointerDown=function(t,e){this.isPointerDown||(this.isPointerDown=!0,this.pointerIdentifier=void 0!==e.pointerId?e.pointerId:e.identifier,this.pointerDown(t,e))},o.prototype.pointerDown=function(t,e){this._bindPostStartEvents(t),this.emitEvent("pointerDown",[t,e])};var r={mousedown:["mousemove","mouseup"],touchstart:["touchmove","touchend","touchcancel"],pointerdown:["pointermove","pointerup","pointercancel"],MSPointerDown:["MSPointerMove","MSPointerUp","MSPointerCancel"]};return o.prototype._bindPostStartEvents=function(e){if(e){for(var n=r[e.type],o=e.preventDefault?t:document,s=0,a=n.length;a>s;s++){var l=n[s];i.bind(o,l,this)}this._boundPointerEvents={events:n,node:o}}},o.prototype._unbindPostStartEvents=function(){var t=this._boundPointerEvents;if(t&&t.events){for(var e=0,n=t.events.length;n>e;e++){var o=t.events[e];i.unbind(t.node,o,this)}delete this._boundPointerEvents}},o.prototype.onmousemove=function(t){this._pointerMove(t,t)},o.prototype.onMSPointerMove=o.prototype.onpointermove=function(t){t.pointerId==this.pointerIdentifier&&this._pointerMove(t,t)},o.prototype.ontouchmove=function(t){var e=this.getTouch(t.changedTouches);e&&this._pointerMove(t,e)},o.prototype._pointerMove=function(t,e){this.pointerMove(t,e)},o.prototype.pointerMove=function(t,e){this.emitEvent("pointerMove",[t,e])},o.prototype.onmouseup=function(t){this._pointerUp(t,t)},o.prototype.onMSPointerUp=o.prototype.onpointerup=function(t){t.pointerId==this.pointerIdentifier&&this._pointerUp(t,t)},o.prototype.ontouchend=function(t){var e=this.getTouch(t.changedTouches);e&&this._pointerUp(t,e)},o.prototype._pointerUp=function(t,e){this._pointerDone(),this.pointerUp(t,e)},o.prototype.pointerUp=function(t,e){this.emitEvent("pointerUp",[t,e])},o.prototype._pointerDone=function(){this.isPointerDown=!1,delete this.pointerIdentifier,this._unbindPostStartEvents(),this.pointerDone()},o.prototype.pointerDone=n,o.prototype.onMSPointerCancel=o.prototype.onpointercancel=function(t){t.pointerId==this.pointerIdentifier&&this._pointerCancel(t,t)},o.prototype.ontouchcancel=function(t){var e=this.getTouch(t.changedTouches);e&&this._pointerCancel(t,e)},o.prototype._pointerCancel=function(t,e){this._pointerDone(),this.pointerCancel(t,e)},o.prototype.pointerCancel=function(t,e){this.emitEvent("pointerCancel",[t,e])},o.getPointerPoint=function(t){return{x:void 0!==t.pageX?t.pageX:t.clientX,y:void 0!==t.pageY?t.pageY:t.clientY}},o}),function(t,e){"function"==typeof define&&define.amd?define("unidragger/unidragger",["eventie/eventie","unipointer/unipointer"],function(i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(t,require("eventie"),require("unipointer")):t.Unidragger=e(t,t.eventie,t.Unipointer)}(window,function(t,e,i){function n(){}function o(t){t.preventDefault?t.preventDefault():t.returnValue=!1}function r(){}function s(){return!1}r.prototype=new i,r.prototype.bindHandles=function(){this._bindHandles(!0)},r.prototype.unbindHandles=function(){this._bindHandles(!1)};var a=t.navigator;r.prototype._bindHandles=function(t){t=void 0===t?!0:!!t;var i;i=a.pointerEnabled?function(e){e.style.touchAction=t?"none":""}:a.msPointerEnabled?function(e){e.style.msTouchAction=t?"none":""}:function(){t&&c(s)};for(var n=t?"bind":"unbind",o=0,r=this.handles.length;r>o;o++){var s=this.handles[o];this._bindStartEvent(s,t),i(s),e[n](s,"click",this)}};var l="attachEvent"in document.documentElement,c=l?function(t){"IMG"==t.nodeName&&(t.ondragstart=s);for(var e=t.querySelectorAll("img"),i=0,n=e.length;n>i;i++){var o=e[i];o.ondragstart=s}}:n;r.prototype.pointerDown=function(i,n){if("INPUT"==i.target.nodeName&&"range"==i.target.type)return this.isPointerDown=!1,void delete this.pointerIdentifier;this._dragPointerDown(i,n);var o=document.activeElement;o&&o.blur&&o.blur(),this._bindPostStartEvents(i),this.pointerDownScroll=r.getScrollPosition(),e.bind(t,"scroll",this),this.emitEvent("pointerDown",[i,n])},r.prototype._dragPointerDown=function(t,e){this.pointerDownPoint=i.getPointerPoint(e);var n="touchstart"==t.type,r=t.target.nodeName;n||"SELECT"==r||o(t)},r.prototype.pointerMove=function(t,e){var i=this._dragPointerMove(t,e);this.emitEvent("pointerMove",[t,e,i]),this._dragMove(t,e,i)},r.prototype._dragPointerMove=function(t,e){var n=i.getPointerPoint(e),o={x:n.x-this.pointerDownPoint.x,y:n.y-this.pointerDownPoint.y};return!this.isDragging&&this.hasDragStarted(o)&&this._dragStart(t,e),o},r.prototype.hasDragStarted=function(t){return Math.abs(t.x)>3||Math.abs(t.y)>3},r.prototype.pointerUp=function(t,e){this.emitEvent("pointerUp",[t,e]),this._dragPointerUp(t,e)},r.prototype._dragPointerUp=function(t,e){this.isDragging?this._dragEnd(t,e):this._staticClick(t,e)},i.prototype.pointerDone=function(){e.unbind(t,"scroll",this)},r.prototype._dragStart=function(t,e){this.isDragging=!0,this.dragStartPoint=r.getPointerPoint(e),this.isPreventingClicks=!0,this.dragStart(t,e)},r.prototype.dragStart=function(t,e){this.emitEvent("dragStart",[t,e])},r.prototype._dragMove=function(t,e,i){this.isDragging&&this.dragMove(t,e,i)
},r.prototype.dragMove=function(t,e,i){o(t),this.emitEvent("dragMove",[t,e,i])},r.prototype._dragEnd=function(t,e){this.isDragging=!1;var i=this;setTimeout(function(){delete i.isPreventingClicks}),this.dragEnd(t,e)},r.prototype.dragEnd=function(t,e){this.emitEvent("dragEnd",[t,e])},r.prototype.pointerDone=function(){e.unbind(t,"scroll",this),delete this.pointerDownScroll},r.prototype.onclick=function(t){this.isPreventingClicks&&o(t)},r.prototype._staticClick=function(t,e){if(!this.isIgnoringMouseUp||"mouseup"!=t.type){var i=t.target.nodeName;if(("INPUT"==i||"TEXTAREA"==i)&&t.target.focus(),this.staticClick(t,e),"mouseup"!=t.type){this.isIgnoringMouseUp=!0;var n=this;setTimeout(function(){delete n.isIgnoringMouseUp},400)}}},r.prototype.staticClick=function(t,e){this.emitEvent("staticClick",[t,e])},r.prototype.onscroll=function(){var t=r.getScrollPosition(),e=this.pointerDownScroll.x-t.x,i=this.pointerDownScroll.y-t.y;(Math.abs(e)>3||Math.abs(i)>3)&&this._pointerDone()},r.getPointerPoint=function(t){return{x:void 0!==t.pageX?t.pageX:t.clientX,y:void 0!==t.pageY?t.pageY:t.clientY}};var h=void 0!==t.pageYOffset;return r.getScrollPosition=function(){return{x:h?t.pageXOffset:document.body.scrollLeft,y:h?t.pageYOffset:document.body.scrollTop}},r.getPointerPoint=i.getPointerPoint,r}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/drag",["classie/classie","eventie/eventie","./flickity","unidragger/unidragger","fizzy-ui-utils/utils"],function(i,n,o,r,s){return e(t,i,n,o,r,s)}):"object"==typeof exports?module.exports=e(t,require("desandro-classie"),require("eventie"),require("./flickity"),require("unidragger"),require("fizzy-ui-utils")):t.Flickity=e(t,t.classie,t.eventie,t.Flickity,t.Unidragger,t.fizzyUIUtils)}(window,function(t,e,i,n,o,r){function s(t){t.preventDefault?t.preventDefault():t.returnValue=!1}function a(e){var i=o.getPointerPoint(e);return i.y-t.pageYOffset}r.extend(n.defaults,{draggable:!0,touchVerticalScroll:!0}),n.createMethods.push("_createDrag"),r.extend(n.prototype,o.prototype),n.prototype._createDrag=function(){this.on("activate",this.bindDrag),this.on("uiChange",this._uiChangeDrag),this.on("childUIPointerDown",this._childUIPointerDownDrag),this.on("deactivate",this.unbindDrag)},n.prototype.bindDrag=function(){this.options.draggable&&!this.isDragBound&&(e.add(this.element,"is-draggable"),this.handles=[this.viewport],this.bindHandles(),this.isDragBound=!0)},n.prototype.unbindDrag=function(){this.isDragBound&&(e.remove(this.element,"is-draggable"),this.unbindHandles(),delete this.isDragBound)},n.prototype._uiChangeDrag=function(){delete this.isFreeScrolling},n.prototype._childUIPointerDownDrag=function(t){s(t),this.pointerDownFocus(t)},n.prototype.pointerDown=function(n,r){if("INPUT"==n.target.nodeName&&"range"==n.target.type)return this.isPointerDown=!1,void delete this.pointerIdentifier;this._dragPointerDown(n,r);var s=document.activeElement;s&&s.blur&&s!=this.element&&s!=document.body&&s.blur(),this.pointerDownFocus(n),this.dragX=this.x,e.add(this.viewport,"is-pointer-down"),this._bindPostStartEvents(n),this.pointerDownScroll=o.getScrollPosition(),i.bind(t,"scroll",this),this.dispatchEvent("pointerDown",n,[r])};var l={touchstart:!0,MSPointerDown:!0},c={INPUT:!0,SELECT:!0};n.prototype.pointerDownFocus=function(t){!this.options.accessibility||l[t.type]||c[t.target.nodeName]||this.element.focus()},n.prototype.pointerMove=function(t,e){var i=this._dragPointerMove(t,e);this.touchVerticalScrollMove(t,e,i),this._dragMove(t,e,i),this.dispatchEvent("pointerMove",t,[e,i])},n.prototype.hasDragStarted=function(t){return!this.isTouchScrolling&&Math.abs(t.x)>3},n.prototype.pointerUp=function(t,i){delete this.isTouchScrolling,e.remove(this.viewport,"is-pointer-down"),this.dispatchEvent("pointerUp",t,[i]),this._dragPointerUp(t,i)};var h={touchmove:!0,MSPointerMove:!0};return n.prototype.touchVerticalScrollMove=function(e,i,n){var o=this.options.touchVerticalScroll,r="withDrag"==o?!o:this.isDragging||!o;!r&&h[e.type]&&!this.isTouchScrolling&&Math.abs(n.y)>10&&(this.startScrollY=t.pageYOffset,this.pointerWindowStartY=a(i),this.isTouchScrolling=!0)},n.prototype.dragStart=function(t,e){this.dragStartPosition=this.x,this.startAnimation(),this.dispatchEvent("dragStart",t,[e])},n.prototype.dragMove=function(t,e,i){s(t),this.previousDragX=this.dragX;var n=this.options.rightToLeft?-1:1,o=this.dragStartPosition+i.x*n;if(!this.options.wrapAround&&this.cells.length){var r=Math.max(-this.cells[0].target,this.dragStartPosition);o=o>r?.5*(o+r):o;var a=Math.min(-this.getLastCell().target,this.dragStartPosition);o=a>o?.5*(o+a):o}this.dragX=o,this.dragMoveTime=new Date,this.dispatchEvent("dragMove",t,[e,i])},n.prototype.dragEnd=function(t,e){this.options.freeScroll&&(this.isFreeScrolling=!0);var i=this.dragEndRestingSelect();if(this.options.freeScroll&&!this.options.wrapAround){var n=this.getRestingPosition();this.isFreeScrolling=-n>this.cells[0].target&&-n<this.getLastCell().target}else this.options.freeScroll||i!=this.selectedIndex||(i+=this.dragEndBoostSelect());delete this.previousDragX,this.select(i),this.dispatchEvent("dragEnd",t,[e])},n.prototype.dragEndRestingSelect=function(){var t=this.getRestingPosition(),e=Math.abs(this.getCellDistance(-t,this.selectedIndex)),i=this._getClosestResting(t,e,1),n=this._getClosestResting(t,e,-1),o=i.distance<n.distance?i.index:n.index;return o},n.prototype._getClosestResting=function(t,e,i){for(var n=this.selectedIndex,o=1/0,r=this.options.contain&&!this.options.wrapAround?function(t,e){return e>=t}:function(t,e){return e>t};r(e,o)&&(n+=i,o=e,e=this.getCellDistance(-t,n),null!==e);)e=Math.abs(e);return{distance:o,index:n-i}},n.prototype.getCellDistance=function(t,e){var i=this.cells.length,n=this.options.wrapAround&&i>1,o=n?r.modulo(e,i):e,s=this.cells[o];if(!s)return null;var a=n?this.slideableWidth*Math.floor(e/i):0;return t-(s.target+a)},n.prototype.dragEndBoostSelect=function(){if(void 0===this.previousDragX||!this.dragMoveTime||new Date-this.dragMoveTime>100)return 0;var t=this.getCellDistance(-this.dragX,this.selectedIndex),e=this.previousDragX-this.dragX;return t>0&&e>0?1:0>t&&0>e?-1:0},n.prototype.staticClick=function(t,e){var i=this.getParentCell(t.target),n=i&&i.element,o=i&&r.indexOf(this.cells,i);this.dispatchEvent("staticClick",t,[e,n,o])},n}),function(t,e){"function"==typeof define&&define.amd?define("tap-listener/tap-listener",["unipointer/unipointer"],function(i){return e(t,i)}):"object"==typeof exports?module.exports=e(t,require("unipointer")):t.TapListener=e(t,t.Unipointer)}(window,function(t,e){function i(t){t.preventDefault?t.preventDefault():t.returnValue=!1}function n(t){this.bindTap(t)}n.prototype=new e,n.prototype.bindTap=function(t){t&&(this.unbindTap(),this.tapElement=t,this._bindStartEvent(t,!0))},n.prototype.unbindTap=function(){this.tapElement&&(this._bindStartEvent(this.tapElement,!0),delete this.tapElement)};var o=n.prototype.pointerDown;n.prototype.pointerDown=function(t){"touchstart"==t.type&&i(t),o.apply(this,arguments)};var r=void 0!==t.pageYOffset;return n.prototype.pointerUp=function(i,n){var o=e.getPointerPoint(n),s=this.tapElement.getBoundingClientRect(),a=r?t.pageXOffset:document.body.scrollLeft,l=r?t.pageYOffset:document.body.scrollTop,c=o.x>=s.left+a&&o.x<=s.right+a&&o.y>=s.top+l&&o.y<=s.bottom+l;c&&this.emitEvent("tap",[i,n])},n.prototype.destroy=function(){this.pointerDone(),this.unbindTap()},n}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/prev-next-button",["eventie/eventie","./flickity","tap-listener/tap-listener","fizzy-ui-utils/utils"],function(i,n,o,r){return e(t,i,n,o,r)}):"object"==typeof exports?module.exports=e(t,require("eventie"),require("./flickity"),require("tap-listener"),require("fizzy-ui-utils")):e(t,t.eventie,t.Flickity,t.TapListener,t.fizzyUIUtils)}(window,function(t,e,i,n,o){function r(t,e){this.direction=t,this.parent=e,this._create()}function s(t){return"string"==typeof t?t:"M "+t.x0+",50 L "+t.x1+","+(t.y1+50)+" L "+t.x2+","+(t.y2+50)+" L "+t.x3+",50  L "+t.x2+","+(50-t.y2)+" L "+t.x1+","+(50-t.y1)+" Z"}var a="http://www.w3.org/2000/svg",l=function(){function t(){if(void 0!==e)return e;var t=document.createElement("div");return t.innerHTML="<svg/>",e=(t.firstChild&&t.firstChild.namespaceURI)==a}var e;return t}();return r.prototype=new n,r.prototype._create=function(){this.isEnabled=!0,this.isPrevious=-1==this.direction;var t=this.parent.options.rightToLeft?1:-1;this.isLeft=this.direction==t;var e=this.element=document.createElement("button");if(e.className="flickity-prev-next-button",e.className+=this.isPrevious?" previous":" next",e.setAttribute("type","button"),i.setUnselectable(e),l()){var n=this.createSVG();e.appendChild(n)}else this.setArrowText(),e.className+=" no-svg";var o=this;this.onCellSelect=function(){o.update()},this.parent.on("cellSelect",this.onCellSelect),this.on("tap",this.onTap),this.on("pointerDown",function(t,e){o.parent.childUIPointerDown(e)})},r.prototype.activate=function(){this.update(),this.bindTap(this.element),e.bind(this.element,"click",this),this.parent.element.appendChild(this.element)},r.prototype.deactivate=function(){this.parent.element.removeChild(this.element),n.prototype.destroy.call(this),e.unbind(this.element,"click",this)},r.prototype.createSVG=function(){var t=document.createElementNS(a,"svg");t.setAttribute("viewBox","0 0 100 100");var e=document.createElementNS(a,"path"),i=s(this.parent.options.arrowShape);return e.setAttribute("d",i),e.setAttribute("class","arrow"),this.isLeft||e.setAttribute("transform","translate(100, 100) rotate(180) "),t.appendChild(e),t},r.prototype.setArrowText=function(){var t=this.parent.options,e=this.isLeft?t.leftArrowText:t.rightArrowText;o.setText(this.element,e)},r.prototype.onTap=function(){if(this.isEnabled){this.parent.uiChange();var t=this.isPrevious?"previous":"next";this.parent[t]()}},r.prototype.handleEvent=o.handleEvent,r.prototype.onclick=function(){var t=document.activeElement;t&&t==this.element&&this.onTap()},r.prototype.enable=function(){this.isEnabled||(this.element.disabled=!1,this.isEnabled=!0)},r.prototype.disable=function(){this.isEnabled&&(this.element.disabled=!0,this.isEnabled=!1)},r.prototype.update=function(){var t=this.parent.cells;if(this.parent.options.wrapAround&&t.length>1)return void this.enable();var e=t.length?t.length-1:0,i=this.isPrevious?0:e,n=this.parent.selectedIndex==i?"disable":"enable";this[n]()},r.prototype.destroy=function(){this.deactivate()},o.extend(i.defaults,{prevNextButtons:!0,leftArrowText:"â€¹",rightArrowText:"â€º",arrowShape:{x0:10,x1:60,y1:50,x2:70,y2:40,x3:30}}),i.createMethods.push("_createPrevNextButtons"),i.prototype._createPrevNextButtons=function(){this.options.prevNextButtons&&(this.prevButton=new r(-1,this),this.nextButton=new r(1,this),this.on("activate",this.activatePrevNextButtons))},i.prototype.activatePrevNextButtons=function(){this.prevButton.activate(),this.nextButton.activate(),this.on("deactivate",this.deactivatePrevNextButtons)},i.prototype.deactivatePrevNextButtons=function(){this.prevButton.deactivate(),this.nextButton.deactivate(),this.off("deactivate",this.deactivatePrevNextButtons)},i.PrevNextButton=r,i}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/page-dots",["eventie/eventie","./flickity","tap-listener/tap-listener","fizzy-ui-utils/utils"],function(i,n,o,r){return e(t,i,n,o,r)}):"object"==typeof exports?module.exports=e(t,require("eventie"),require("./flickity"),require("tap-listener"),require("fizzy-ui-utils")):e(t,t.eventie,t.Flickity,t.TapListener,t.fizzyUIUtils)}(window,function(t,e,i,n,o){function r(t){this.parent=t,this._create()}return r.prototype=new n,r.prototype._create=function(){this.holder=document.createElement("ol"),this.holder.className="flickity-page-dots",i.setUnselectable(this.holder),this.dots=[];var t=this;this.onCellSelect=function(){t.updateSelected()},this.parent.on("cellSelect",this.onCellSelect),this.on("tap",this.onTap),this.on("pointerDown",function(e,i){t.parent.childUIPointerDown(i)})},r.prototype.activate=function(){this.setDots(),this.updateSelected(),this.bindTap(this.holder),this.parent.element.appendChild(this.holder)},r.prototype.deactivate=function(){this.parent.element.removeChild(this.holder),n.prototype.destroy.call(this)},r.prototype.setDots=function(){var t=this.parent.cells.length-this.dots.length;t>0?this.addDots(t):0>t&&this.removeDots(-t)},r.prototype.addDots=function(t){for(var e=document.createDocumentFragment(),i=[];t;){var n=document.createElement("li");n.className="dot",e.appendChild(n),i.push(n),t--}this.holder.appendChild(e),this.dots=this.dots.concat(i)},r.prototype.removeDots=function(t){for(var e=this.dots.splice(this.dots.length-t,t),i=0,n=e.length;n>i;i++){var o=e[i];this.holder.removeChild(o)}},r.prototype.updateSelected=function(){this.selectedDot&&(this.selectedDot.className="dot"),this.dots.length&&(this.selectedDot=this.dots[this.parent.selectedIndex],this.selectedDot.className="dot is-selected")},r.prototype.onTap=function(t){var e=t.target;if("LI"==e.nodeName){this.parent.uiChange();var i=o.indexOf(this.dots,e);this.parent.select(i)}},r.prototype.destroy=function(){this.deactivate()},i.PageDots=r,o.extend(i.defaults,{pageDots:!0}),i.createMethods.push("_createPageDots"),i.prototype._createPageDots=function(){this.options.pageDots&&(this.pageDots=new r(this),this.on("activate",this.activatePageDots),this.on("cellAddedRemoved",this.onCellAddedRemovedPageDots),this.on("deactivate",this.deactivatePageDots))},i.prototype.activatePageDots=function(){this.pageDots.activate()},i.prototype.onCellAddedRemovedPageDots=function(){this.pageDots.setDots()},i.prototype.deactivatePageDots=function(){this.pageDots.deactivate()},i.PageDots=r,i}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/player",["eventEmitter/EventEmitter","eventie/eventie","./flickity"],function(t,i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(require("wolfy87-eventemitter"),require("eventie"),require("./flickity")):e(t.EventEmitter,t.eventie,t.Flickity)}(window,function(t,e,i){function n(t){if(this.isPlaying=!1,this.parent=t,r){var e=this;this.onVisibilityChange=function(){e.visibilityChange()}}}var o,r;return"hidden"in document?(o="hidden",r="visibilitychange"):"webkitHidden"in document&&(o="webkitHidden",r="webkitvisibilitychange"),n.prototype=new t,n.prototype.play=function(){this.isPlaying=!0,delete this.isPaused,r&&document.addEventListener(r,this.onVisibilityChange,!1),this.tick()},n.prototype.tick=function(){if(this.isPlaying&&!this.isPaused){this.tickTime=new Date;var t=this.parent.options.autoPlay;t="number"==typeof t?t:3e3;var e=this;this.timeout=setTimeout(function(){e.parent.next(!0),e.tick()},t)}},n.prototype.stop=function(){this.isPlaying=!1,delete this.isPaused,this.clear(),r&&document.removeEventListener(r,this.onVisibilityChange,!1)},n.prototype.clear=function(){clearTimeout(this.timeout)},n.prototype.pause=function(){this.isPlaying&&(this.isPaused=!0,this.clear())},n.prototype.unpause=function(){this.isPaused&&this.play()},n.prototype.visibilityChange=function(){var t=document[o];this[t?"pause":"unpause"]()},i.createMethods.push("_createPlayer"),i.prototype._createPlayer=function(){this.player=new n(this),this.on("activate",this.activatePlayer),this.on("uiChange",this.stopPlayer),this.on("pointerDown",this.stopPlayer),this.on("deactivate",this.deactivatePlayer)},i.prototype.activatePlayer=function(){this.options.autoPlay&&(this.player.play(),e.bind(this.element,"mouseenter",this),this.isMouseenterBound=!0)},i.prototype.stopPlayer=function(){this.player.stop()},i.prototype.deactivatePlayer=function(){this.player.stop(),this.isMouseenterBound&&(e.unbind(this.element,"mouseenter",this),delete this.isMouseenterBound)},i.prototype.onmouseenter=function(){this.player.pause(),e.bind(this.element,"mouseleave",this)},i.prototype.onmouseleave=function(){this.player.unpause(),e.unbind(this.element,"mouseleave",this)},i.Player=n,i}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/add-remove-cell",["./flickity","fizzy-ui-utils/utils"],function(i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(t,require("./flickity"),require("fizzy-ui-utils")):e(t,t.Flickity,t.fizzyUIUtils)}(window,function(t,e,i){function n(t){for(var e=document.createDocumentFragment(),i=0,n=t.length;n>i;i++){var o=t[i];e.appendChild(o.element)}return e}return e.prototype.insert=function(t,e){var i=this._makeCells(t);if(i&&i.length){var o=this.cells.length;e=void 0===e?o:e;var r=n(i),s=e==o;if(s)this.slider.appendChild(r);else{var a=this.cells[e].element;this.slider.insertBefore(r,a)}if(0===e)this.cells=i.concat(this.cells);else if(s)this.cells=this.cells.concat(i);else{var l=this.cells.splice(e,o-e);this.cells=this.cells.concat(i).concat(l)}this._sizeCells(i);var c=e>this.selectedIndex?0:i.length;this._cellAddedRemoved(e,c)}},e.prototype.append=function(t){this.insert(t,this.cells.length)},e.prototype.prepend=function(t){this.insert(t,0)},e.prototype.remove=function(t){var e,n,o,r=this.getCells(t),s=0;for(e=0,n=r.length;n>e;e++){o=r[e];var a=i.indexOf(this.cells,o)<this.selectedIndex;s-=a?1:0}for(e=0,n=r.length;n>e;e++)o=r[e],o.remove(),i.removeFrom(this.cells,o);r.length&&this._cellAddedRemoved(0,s)},e.prototype._cellAddedRemoved=function(t,e){e=e||0,this.selectedIndex+=e,this.selectedIndex=Math.max(0,Math.min(this.cells.length-1,this.selectedIndex)),this.emitEvent("cellAddedRemoved",[t,e]),this.cellChange(t,!0)},e.prototype.cellSizeChange=function(t){var e=this.getCell(t);if(e){e.getSize();var n=i.indexOf(this.cells,e);this.cellChange(n)}},e.prototype.cellChange=function(t,e){var i=this.slideableWidth;this._positionCells(t),this._getWrapShiftCells(),this.setGallerySize(),this.options.freeScroll?(this.x+=i-this.slideableWidth,this.positionSlider()):(e&&this.positionSliderAtSelected(),this.select(this.selectedIndex))},e}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/lazyload",["classie/classie","eventie/eventie","./flickity","fizzy-ui-utils/utils"],function(i,n,o,r){return e(t,i,n,o,r)}):"object"==typeof exports?module.exports=e(t,require("desandro-classie"),require("eventie"),require("./flickity"),require("fizzy-ui-utils")):e(t,t.classie,t.eventie,t.Flickity,t.fizzyUIUtils)}(window,function(t,e,i,n,o){function r(t){if("IMG"==t.nodeName&&t.getAttribute("data-flickity-lazyload"))return[t];var e=t.querySelectorAll("img[data-flickity-lazyload]");return o.makeArray(e)}function s(t,e){this.img=t,this.flickity=e,this.load()}return n.createMethods.push("_createLazyload"),n.prototype._createLazyload=function(){this.on("cellSelect",this.lazyLoad)},n.prototype.lazyLoad=function(){var t=this.options.lazyLoad;if(t){for(var e="number"==typeof t?t:0,i=this.getAdjacentCellElements(e),n=[],o=0,a=i.length;a>o;o++){var l=i[o],c=r(l);n=n.concat(c)}for(o=0,a=n.length;a>o;o++){var h=n[o];new s(h,this)}}},s.prototype.handleEvent=o.handleEvent,s.prototype.load=function(){i.bind(this.img,"load",this),i.bind(this.img,"error",this),this.img.src=this.img.getAttribute("data-flickity-lazyload"),this.img.removeAttribute("data-flickity-lazyload")},s.prototype.onload=function(t){this.complete(t,"flickity-lazyloaded")},s.prototype.onerror=function(){this.complete(event,"flickity-lazyerror")},s.prototype.complete=function(t,n){i.unbind(this.img,"load",this),i.unbind(this.img,"error",this);var o=this.flickity.getParentCell(this.img),r=o&&o.element;this.flickity.cellSizeChange(r),e.add(this.img,n),this.flickity.dispatchEvent("lazyLoad",t,r)},n.LazyLoader=s,n}),function(t,e){"function"==typeof define&&define.amd?define("flickity/js/index",["./flickity","./drag","./prev-next-button","./page-dots","./player","./add-remove-cell","./lazyload"],e):"object"==typeof exports&&(module.exports=e(require("./flickity"),require("./drag"),require("./prev-next-button"),require("./page-dots"),require("./player"),require("./add-remove-cell"),require("./lazyload")))}(window,function(t){return t}),function(t,e){"function"==typeof define&&define.amd?define("flickity-as-nav-for/as-nav-for",["classie/classie","flickity/js/index","fizzy-ui-utils/utils"],function(i,n,o){return e(t,i,n,o)}):"object"==typeof exports?module.exports=e(t,require("desandro-classie"),require("flickity"),require("fizzy-ui-utils")):t.Flickity=e(t,t.classie,t.Flickity,t.fizzyUIUtils)}(window,function(t,e,i,n){return i.createMethods.push("_createAsNavFor"),i.prototype._createAsNavFor=function(){this.on("activate",this.activateAsNavFor),this.on("deactivate",this.deactivateAsNavFor),this.on("destroy",this.destroyAsNavFor);var t=this.options.asNavFor;if(t){var e=this;setTimeout(function(){e.setNavCompanion(t)})}},i.prototype.setNavCompanion=function(t){t=n.getQueryElement(t);var e=i.data(t);if(e&&e!=this){this.navCompanion=e;var o=this;this.onNavCompanionSelect=function(){o.navCompanionSelect()},e.on("cellSelect",this.onNavCompanionSelect),this.on("staticClick",this.onNavStaticClick),this.navCompanionSelect()}},i.prototype.navCompanionSelect=function(){if(this.navCompanion){var t=this.navCompanion.selectedIndex;this.select(t),this.removeNavSelectedElement(),this.selectedIndex==t&&(this.navSelectedElement=this.cells[t].element,e.add(this.navSelectedElement,"is-nav-selected"))}},i.prototype.activateAsNavFor=function(){this.navCompanionSelect()},i.prototype.removeNavSelectedElement=function(){this.navSelectedElement&&(e.remove(this.navSelectedElement,"is-nav-selected"),delete this.navSelectedElement)},i.prototype.onNavStaticClick=function(t,e,i,n){"number"==typeof n&&this.navCompanion.select(n)},i.prototype.deactivateAsNavFor=function(){this.removeNavSelectedElement()},i.prototype.destroyAsNavFor=function(){this.navCompanion&&(this.navCompanion.off("cellSelect",this.onNavCompanionSelect),this.off("staticClick",this.onNavStaticClick),delete this.navCompanion)},i}),function(t,e){"function"==typeof define&&define.amd?define("imagesloaded/imagesloaded",["eventEmitter/EventEmitter","eventie/eventie"],function(i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(t,require("wolfy87-eventemitter"),require("eventie")):t.imagesLoaded=e(t,t.EventEmitter,t.eventie)}(window,function(t,e,i){function n(t,e){for(var i in e)t[i]=e[i];return t}function o(t){return"[object Array]"===d.call(t)}function r(t){var e=[];if(o(t))e=t;else if("number"==typeof t.length)for(var i=0,n=t.length;n>i;i++)e.push(t[i]);else e.push(t);return e}function s(t,e,i){if(!(this instanceof s))return new s(t,e);"string"==typeof t&&(t=document.querySelectorAll(t)),this.elements=r(t),this.options=n({},this.options),"function"==typeof e?i=e:n(this.options,e),i&&this.on("always",i),this.getImages(),c&&(this.jqDeferred=new c.Deferred);var o=this;setTimeout(function(){o.check()})}function a(t){this.img=t}function l(t){this.src=t,u[t]=this}var c=t.jQuery,h=t.console,p="undefined"!=typeof h,d=Object.prototype.toString;s.prototype=new e,s.prototype.options={},s.prototype.getImages=function(){this.images=[];for(var t=0,e=this.elements.length;e>t;t++){var i=this.elements[t];"IMG"===i.nodeName&&this.addImage(i);var n=i.nodeType;if(n&&(1===n||9===n||11===n))for(var o=i.querySelectorAll("img"),r=0,s=o.length;s>r;r++){var a=o[r];this.addImage(a)}}},s.prototype.addImage=function(t){var e=new a(t);this.images.push(e)},s.prototype.check=function(){function t(t,o){return e.options.debug&&p&&h.log("confirm",t,o),e.progress(t),i++,i===n&&e.complete(),!0}var e=this,i=0,n=this.images.length;if(this.hasAnyBroken=!1,!n)return void this.complete();for(var o=0;n>o;o++){var r=this.images[o];r.on("confirm",t),r.check()}},s.prototype.progress=function(t){this.hasAnyBroken=this.hasAnyBroken||!t.isLoaded;var e=this;setTimeout(function(){e.emit("progress",e,t),e.jqDeferred&&e.jqDeferred.notify&&e.jqDeferred.notify(e,t)})},s.prototype.complete=function(){var t=this.hasAnyBroken?"fail":"done";this.isComplete=!0;var e=this;setTimeout(function(){if(e.emit(t,e),e.emit("always",e),e.jqDeferred){var i=e.hasAnyBroken?"reject":"resolve";e.jqDeferred[i](e)}})},c&&(c.fn.imagesLoaded=function(t,e){var i=new s(this,t,e);return i.jqDeferred.promise(c(this))}),a.prototype=new e,a.prototype.check=function(){var t=u[this.img.src]||new l(this.img.src);if(t.isConfirmed)return void this.confirm(t.isLoaded,"cached was confirmed");if(this.img.complete&&void 0!==this.img.naturalWidth)return void this.confirm(0!==this.img.naturalWidth,"naturalWidth");var e=this;t.on("confirm",function(t,i){return e.confirm(t.isLoaded,i),!0}),t.check()},a.prototype.confirm=function(t,e){this.isLoaded=t,this.emit("confirm",this,e)};var u={};return l.prototype=new e,l.prototype.check=function(){if(!this.isChecked){var t=new Image;i.bind(t,"load",this),i.bind(t,"error",this),t.src=this.src,this.isChecked=!0}},l.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},l.prototype.onload=function(t){this.confirm(!0,"onload"),this.unbindProxyEvents(t)},l.prototype.onerror=function(t){this.confirm(!1,"onerror"),this.unbindProxyEvents(t)},l.prototype.confirm=function(t,e){this.isConfirmed=!0,this.isLoaded=t,this.emit("confirm",this,e)},l.prototype.unbindProxyEvents=function(t){i.unbind(t.target,"load",this),i.unbind(t.target,"error",this)},s}),function(t,e){"function"==typeof define&&define.amd?define(["flickity/js/index","imagesloaded/imagesloaded"],function(i,n){return e(t,i,n)}):"object"==typeof exports?module.exports=e(t,require("flickity"),require("imagesloaded")):t.Flickity=e(t,t.Flickity,t.imagesLoaded)}(window,function(t,e,i){return e.createMethods.push("_createImagesLoaded"),e.prototype._createImagesLoaded=function(){this.on("activate",this.imagesLoaded)},e.prototype.imagesLoaded=function(){function t(t,i){var n=e.getParentCell(i.img);e.cellSizeChange(n&&n.element),e.options.freeScroll||e.positionSliderAtSelected()}if(this.options.imagesLoaded){var e=this;i(this.slider).on("progress",t)}},e});
/*!
 * Isotope PACKAGED v2.2.2
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2015 Metafizzy
 */

!function(a){function b(){}function c(a){function c(b){b.prototype.option||(b.prototype.option=function(b){a.isPlainObject(b)&&(this.options=a.extend(!0,this.options,b))})}function e(b,c){a.fn[b]=function(e){if("string"==typeof e){for(var g=d.call(arguments,1),h=0,i=this.length;i>h;h++){var j=this[h],k=a.data(j,b);if(k)if(a.isFunction(k[e])&&"_"!==e.charAt(0)){var l=k[e].apply(k,g);if(void 0!==l)return l}else f("no such method '"+e+"' for "+b+" instance");else f("cannot call methods on "+b+" prior to initialization; attempted to call '"+e+"'")}return this}return this.each(function(){var d=a.data(this,b);d?(d.option(e),d._init()):(d=new c(this,e),a.data(this,b,d))})}}if(a){var f="undefined"==typeof console?b:function(a){console.error(a)};return a.bridget=function(a,b){c(b),e(a,b)},a.bridget}}var d=Array.prototype.slice;"function"==typeof define&&define.amd?define("jquery-bridget/jquery.bridget",["jquery"],c):c("object"==typeof exports?require("jquery"):a.jQuery)}(window),function(a){function b(b){var c=a.event;return c.target=c.target||c.srcElement||b,c}var c=document.documentElement,d=function(){};c.addEventListener?d=function(a,b,c){a.addEventListener(b,c,!1)}:c.attachEvent&&(d=function(a,c,d){a[c+d]=d.handleEvent?function(){var c=b(a);d.handleEvent.call(d,c)}:function(){var c=b(a);d.call(a,c)},a.attachEvent("on"+c,a[c+d])});var e=function(){};c.removeEventListener?e=function(a,b,c){a.removeEventListener(b,c,!1)}:c.detachEvent&&(e=function(a,b,c){a.detachEvent("on"+b,a[b+c]);try{delete a[b+c]}catch(d){a[b+c]=void 0}});var f={bind:d,unbind:e};"function"==typeof define&&define.amd?define("eventie/eventie",f):"object"==typeof exports?module.exports=f:a.eventie=f}(window),function(){"use strict";function a(){}function b(a,b){for(var c=a.length;c--;)if(a[c].listener===b)return c;return-1}function c(a){return function(){return this[a].apply(this,arguments)}}var d=a.prototype,e=this,f=e.EventEmitter;d.getListeners=function(a){var b,c,d=this._getEvents();if(a instanceof RegExp){b={};for(c in d)d.hasOwnProperty(c)&&a.test(c)&&(b[c]=d[c])}else b=d[a]||(d[a]=[]);return b},d.flattenListeners=function(a){var b,c=[];for(b=0;b<a.length;b+=1)c.push(a[b].listener);return c},d.getListenersAsObject=function(a){var b,c=this.getListeners(a);return c instanceof Array&&(b={},b[a]=c),b||c},d.addListener=function(a,c){var d,e=this.getListenersAsObject(a),f="object"==typeof c;for(d in e)e.hasOwnProperty(d)&&-1===b(e[d],c)&&e[d].push(f?c:{listener:c,once:!1});return this},d.on=c("addListener"),d.addOnceListener=function(a,b){return this.addListener(a,{listener:b,once:!0})},d.once=c("addOnceListener"),d.defineEvent=function(a){return this.getListeners(a),this},d.defineEvents=function(a){for(var b=0;b<a.length;b+=1)this.defineEvent(a[b]);return this},d.removeListener=function(a,c){var d,e,f=this.getListenersAsObject(a);for(e in f)f.hasOwnProperty(e)&&(d=b(f[e],c),-1!==d&&f[e].splice(d,1));return this},d.off=c("removeListener"),d.addListeners=function(a,b){return this.manipulateListeners(!1,a,b)},d.removeListeners=function(a,b){return this.manipulateListeners(!0,a,b)},d.manipulateListeners=function(a,b,c){var d,e,f=a?this.removeListener:this.addListener,g=a?this.removeListeners:this.addListeners;if("object"!=typeof b||b instanceof RegExp)for(d=c.length;d--;)f.call(this,b,c[d]);else for(d in b)b.hasOwnProperty(d)&&(e=b[d])&&("function"==typeof e?f.call(this,d,e):g.call(this,d,e));return this},d.removeEvent=function(a){var b,c=typeof a,d=this._getEvents();if("string"===c)delete d[a];else if(a instanceof RegExp)for(b in d)d.hasOwnProperty(b)&&a.test(b)&&delete d[b];else delete this._events;return this},d.removeAllListeners=c("removeEvent"),d.emitEvent=function(a,b){var c,d,e,f,g=this.getListenersAsObject(a);for(e in g)if(g.hasOwnProperty(e))for(d=g[e].length;d--;)c=g[e][d],c.once===!0&&this.removeListener(a,c.listener),f=c.listener.apply(this,b||[]),f===this._getOnceReturnValue()&&this.removeListener(a,c.listener);return this},d.trigger=c("emitEvent"),d.emit=function(a){var b=Array.prototype.slice.call(arguments,1);return this.emitEvent(a,b)},d.setOnceReturnValue=function(a){return this._onceReturnValue=a,this},d._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},d._getEvents=function(){return this._events||(this._events={})},a.noConflict=function(){return e.EventEmitter=f,a},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return a}):"object"==typeof module&&module.exports?module.exports=a:e.EventEmitter=a}.call(this),function(a){function b(a){if(a){if("string"==typeof d[a])return a;a=a.charAt(0).toUpperCase()+a.slice(1);for(var b,e=0,f=c.length;f>e;e++)if(b=c[e]+a,"string"==typeof d[b])return b}}var c="Webkit Moz ms Ms O".split(" "),d=document.documentElement.style;"function"==typeof define&&define.amd?define("get-style-property/get-style-property",[],function(){return b}):"object"==typeof exports?module.exports=b:a.getStyleProperty=b}(window),function(a,b){function c(a){var b=parseFloat(a),c=-1===a.indexOf("%")&&!isNaN(b);return c&&b}function d(){}function e(){for(var a={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},b=0,c=h.length;c>b;b++){var d=h[b];a[d]=0}return a}function f(b){function d(){if(!m){m=!0;var d=a.getComputedStyle;if(j=function(){var a=d?function(a){return d(a,null)}:function(a){return a.currentStyle};return function(b){var c=a(b);return c||g("Style returned "+c+". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"),c}}(),k=b("boxSizing")){var e=document.createElement("div");e.style.width="200px",e.style.padding="1px 2px 3px 4px",e.style.borderStyle="solid",e.style.borderWidth="1px 2px 3px 4px",e.style[k]="border-box";var f=document.body||document.documentElement;f.appendChild(e);var h=j(e);l=200===c(h.width),f.removeChild(e)}}}function f(a){if(d(),"string"==typeof a&&(a=document.querySelector(a)),a&&"object"==typeof a&&a.nodeType){var b=j(a);if("none"===b.display)return e();var f={};f.width=a.offsetWidth,f.height=a.offsetHeight;for(var g=f.isBorderBox=!(!k||!b[k]||"border-box"!==b[k]),m=0,n=h.length;n>m;m++){var o=h[m],p=b[o];p=i(a,p);var q=parseFloat(p);f[o]=isNaN(q)?0:q}var r=f.paddingLeft+f.paddingRight,s=f.paddingTop+f.paddingBottom,t=f.marginLeft+f.marginRight,u=f.marginTop+f.marginBottom,v=f.borderLeftWidth+f.borderRightWidth,w=f.borderTopWidth+f.borderBottomWidth,x=g&&l,y=c(b.width);y!==!1&&(f.width=y+(x?0:r+v));var z=c(b.height);return z!==!1&&(f.height=z+(x?0:s+w)),f.innerWidth=f.width-(r+v),f.innerHeight=f.height-(s+w),f.outerWidth=f.width+t,f.outerHeight=f.height+u,f}}function i(b,c){if(a.getComputedStyle||-1===c.indexOf("%"))return c;var d=b.style,e=d.left,f=b.runtimeStyle,g=f&&f.left;return g&&(f.left=b.currentStyle.left),d.left=c,c=d.pixelLeft,d.left=e,g&&(f.left=g),c}var j,k,l,m=!1;return f}var g="undefined"==typeof console?d:function(a){console.error(a)},h=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"];"function"==typeof define&&define.amd?define("get-size/get-size",["get-style-property/get-style-property"],f):"object"==typeof exports?module.exports=f(require("desandro-get-style-property")):a.getSize=f(a.getStyleProperty)}(window),function(a){function b(a){"function"==typeof a&&(b.isReady?a():g.push(a))}function c(a){var c="readystatechange"===a.type&&"complete"!==f.readyState;b.isReady||c||d()}function d(){b.isReady=!0;for(var a=0,c=g.length;c>a;a++){var d=g[a];d()}}function e(e){return"complete"===f.readyState?d():(e.bind(f,"DOMContentLoaded",c),e.bind(f,"readystatechange",c),e.bind(a,"load",c)),b}var f=a.document,g=[];b.isReady=!1,"function"==typeof define&&define.amd?define("doc-ready/doc-ready",["eventie/eventie"],e):"object"==typeof exports?module.exports=e(require("eventie")):a.docReady=e(a.eventie)}(window),function(a){"use strict";function b(a,b){return a[g](b)}function c(a){if(!a.parentNode){var b=document.createDocumentFragment();b.appendChild(a)}}function d(a,b){c(a);for(var d=a.parentNode.querySelectorAll(b),e=0,f=d.length;f>e;e++)if(d[e]===a)return!0;return!1}function e(a,d){return c(a),b(a,d)}var f,g=function(){if(a.matches)return"matches";if(a.matchesSelector)return"matchesSelector";for(var b=["webkit","moz","ms","o"],c=0,d=b.length;d>c;c++){var e=b[c],f=e+"MatchesSelector";if(a[f])return f}}();if(g){var h=document.createElement("div"),i=b(h,"div");f=i?b:e}else f=d;"function"==typeof define&&define.amd?define("matches-selector/matches-selector",[],function(){return f}):"object"==typeof exports?module.exports=f:window.matchesSelector=f}(Element.prototype),function(a,b){"use strict";"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["doc-ready/doc-ready","matches-selector/matches-selector"],function(c,d){return b(a,c,d)}):"object"==typeof exports?module.exports=b(a,require("doc-ready"),require("desandro-matches-selector")):a.fizzyUIUtils=b(a,a.docReady,a.matchesSelector)}(window,function(a,b,c){var d={};d.extend=function(a,b){for(var c in b)a[c]=b[c];return a},d.modulo=function(a,b){return(a%b+b)%b};var e=Object.prototype.toString;d.isArray=function(a){return"[object Array]"==e.call(a)},d.makeArray=function(a){var b=[];if(d.isArray(a))b=a;else if(a&&"number"==typeof a.length)for(var c=0,e=a.length;e>c;c++)b.push(a[c]);else b.push(a);return b},d.indexOf=Array.prototype.indexOf?function(a,b){return a.indexOf(b)}:function(a,b){for(var c=0,d=a.length;d>c;c++)if(a[c]===b)return c;return-1},d.removeFrom=function(a,b){var c=d.indexOf(a,b);-1!=c&&a.splice(c,1)},d.isElement="function"==typeof HTMLElement||"object"==typeof HTMLElement?function(a){return a instanceof HTMLElement}:function(a){return a&&"object"==typeof a&&1==a.nodeType&&"string"==typeof a.nodeName},d.setText=function(){function a(a,c){b=b||(void 0!==document.documentElement.textContent?"textContent":"innerText"),a[b]=c}var b;return a}(),d.getParent=function(a,b){for(;a!=document.body;)if(a=a.parentNode,c(a,b))return a},d.getQueryElement=function(a){return"string"==typeof a?document.querySelector(a):a},d.handleEvent=function(a){var b="on"+a.type;this[b]&&this[b](a)},d.filterFindElements=function(a,b){a=d.makeArray(a);for(var e=[],f=0,g=a.length;g>f;f++){var h=a[f];if(d.isElement(h))if(b){c(h,b)&&e.push(h);for(var i=h.querySelectorAll(b),j=0,k=i.length;k>j;j++)e.push(i[j])}else e.push(h)}return e},d.debounceMethod=function(a,b,c){var d=a.prototype[b],e=b+"Timeout";a.prototype[b]=function(){var a=this[e];a&&clearTimeout(a);var b=arguments,f=this;this[e]=setTimeout(function(){d.apply(f,b),delete f[e]},c||100)}},d.toDashed=function(a){return a.replace(/(.)([A-Z])/g,function(a,b,c){return b+"-"+c}).toLowerCase()};var f=a.console;return d.htmlInit=function(c,e){b(function(){for(var b=d.toDashed(e),g=document.querySelectorAll(".js-"+b),h="data-"+b+"-options",i=0,j=g.length;j>i;i++){var k,l=g[i],m=l.getAttribute(h);try{k=m&&JSON.parse(m)}catch(n){f&&f.error("Error parsing "+h+" on "+l.nodeName.toLowerCase()+(l.id?"#"+l.id:"")+": "+n);continue}var o=new c(l,k),p=a.jQuery;p&&p.data(l,e,o)}})},d}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("outlayer/item",["eventEmitter/EventEmitter","get-size/get-size","get-style-property/get-style-property","fizzy-ui-utils/utils"],function(c,d,e,f){return b(a,c,d,e,f)}):"object"==typeof exports?module.exports=b(a,require("wolfy87-eventemitter"),require("get-size"),require("desandro-get-style-property"),require("fizzy-ui-utils")):(a.Outlayer={},a.Outlayer.Item=b(a,a.EventEmitter,a.getSize,a.getStyleProperty,a.fizzyUIUtils))}(window,function(a,b,c,d,e){"use strict";function f(a){for(var b in a)return!1;return b=null,!0}function g(a,b){a&&(this.element=a,this.layout=b,this.position={x:0,y:0},this._create())}function h(a){return a.replace(/([A-Z])/g,function(a){return"-"+a.toLowerCase()})}var i=a.getComputedStyle,j=i?function(a){return i(a,null)}:function(a){return a.currentStyle},k=d("transition"),l=d("transform"),m=k&&l,n=!!d("perspective"),o={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"otransitionend",transition:"transitionend"}[k],p=["transform","transition","transitionDuration","transitionProperty"],q=function(){for(var a={},b=0,c=p.length;c>b;b++){var e=p[b],f=d(e);f&&f!==e&&(a[e]=f)}return a}();e.extend(g.prototype,b.prototype),g.prototype._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},g.prototype.handleEvent=function(a){var b="on"+a.type;this[b]&&this[b](a)},g.prototype.getSize=function(){this.size=c(this.element)},g.prototype.css=function(a){var b=this.element.style;for(var c in a){var d=q[c]||c;b[d]=a[c]}},g.prototype.getPosition=function(){var a=j(this.element),b=this.layout.options,c=b.isOriginLeft,d=b.isOriginTop,e=a[c?"left":"right"],f=a[d?"top":"bottom"],g=this.layout.size,h=-1!=e.indexOf("%")?parseFloat(e)/100*g.width:parseInt(e,10),i=-1!=f.indexOf("%")?parseFloat(f)/100*g.height:parseInt(f,10);h=isNaN(h)?0:h,i=isNaN(i)?0:i,h-=c?g.paddingLeft:g.paddingRight,i-=d?g.paddingTop:g.paddingBottom,this.position.x=h,this.position.y=i},g.prototype.layoutPosition=function(){var a=this.layout.size,b=this.layout.options,c={},d=b.isOriginLeft?"paddingLeft":"paddingRight",e=b.isOriginLeft?"left":"right",f=b.isOriginLeft?"right":"left",g=this.position.x+a[d];c[e]=this.getXValue(g),c[f]="";var h=b.isOriginTop?"paddingTop":"paddingBottom",i=b.isOriginTop?"top":"bottom",j=b.isOriginTop?"bottom":"top",k=this.position.y+a[h];c[i]=this.getYValue(k),c[j]="",this.css(c),this.emitEvent("layout",[this])},g.prototype.getXValue=function(a){var b=this.layout.options;return b.percentPosition&&!b.isHorizontal?a/this.layout.size.width*100+"%":a+"px"},g.prototype.getYValue=function(a){var b=this.layout.options;return b.percentPosition&&b.isHorizontal?a/this.layout.size.height*100+"%":a+"px"},g.prototype._transitionTo=function(a,b){this.getPosition();var c=this.position.x,d=this.position.y,e=parseInt(a,10),f=parseInt(b,10),g=e===this.position.x&&f===this.position.y;if(this.setPosition(a,b),g&&!this.isTransitioning)return void this.layoutPosition();var h=a-c,i=b-d,j={};j.transform=this.getTranslate(h,i),this.transition({to:j,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},g.prototype.getTranslate=function(a,b){var c=this.layout.options;return a=c.isOriginLeft?a:-a,b=c.isOriginTop?b:-b,n?"translate3d("+a+"px, "+b+"px, 0)":"translate("+a+"px, "+b+"px)"},g.prototype.goTo=function(a,b){this.setPosition(a,b),this.layoutPosition()},g.prototype.moveTo=m?g.prototype._transitionTo:g.prototype.goTo,g.prototype.setPosition=function(a,b){this.position.x=parseInt(a,10),this.position.y=parseInt(b,10)},g.prototype._nonTransition=function(a){this.css(a.to),a.isCleaning&&this._removeStyles(a.to);for(var b in a.onTransitionEnd)a.onTransitionEnd[b].call(this)},g.prototype._transition=function(a){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(a);var b=this._transn;for(var c in a.onTransitionEnd)b.onEnd[c]=a.onTransitionEnd[c];for(c in a.to)b.ingProperties[c]=!0,a.isCleaning&&(b.clean[c]=!0);if(a.from){this.css(a.from);var d=this.element.offsetHeight;d=null}this.enableTransition(a.to),this.css(a.to),this.isTransitioning=!0};var r="opacity,"+h(q.transform||"transform");g.prototype.enableTransition=function(){this.isTransitioning||(this.css({transitionProperty:r,transitionDuration:this.layout.options.transitionDuration}),this.element.addEventListener(o,this,!1))},g.prototype.transition=g.prototype[k?"_transition":"_nonTransition"],g.prototype.onwebkitTransitionEnd=function(a){this.ontransitionend(a)},g.prototype.onotransitionend=function(a){this.ontransitionend(a)};var s={"-webkit-transform":"transform","-moz-transform":"transform","-o-transform":"transform"};g.prototype.ontransitionend=function(a){if(a.target===this.element){var b=this._transn,c=s[a.propertyName]||a.propertyName;if(delete b.ingProperties[c],f(b.ingProperties)&&this.disableTransition(),c in b.clean&&(this.element.style[a.propertyName]="",delete b.clean[c]),c in b.onEnd){var d=b.onEnd[c];d.call(this),delete b.onEnd[c]}this.emitEvent("transitionEnd",[this])}},g.prototype.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(o,this,!1),this.isTransitioning=!1},g.prototype._removeStyles=function(a){var b={};for(var c in a)b[c]="";this.css(b)};var t={transitionProperty:"",transitionDuration:""};return g.prototype.removeTransitionStyles=function(){this.css(t)},g.prototype.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},g.prototype.remove=function(){if(!k||!parseFloat(this.layout.options.transitionDuration))return void this.removeElem();var a=this;this.once("transitionEnd",function(){a.removeElem()}),this.hide()},g.prototype.reveal=function(){delete this.isHidden,this.css({display:""});var a=this.layout.options,b={},c=this.getHideRevealTransitionEndProperty("visibleStyle");b[c]=this.onRevealTransitionEnd,this.transition({from:a.hiddenStyle,to:a.visibleStyle,isCleaning:!0,onTransitionEnd:b})},g.prototype.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},g.prototype.getHideRevealTransitionEndProperty=function(a){var b=this.layout.options[a];if(b.opacity)return"opacity";for(var c in b)return c},g.prototype.hide=function(){this.isHidden=!0,this.css({display:""});var a=this.layout.options,b={},c=this.getHideRevealTransitionEndProperty("hiddenStyle");b[c]=this.onHideTransitionEnd,this.transition({from:a.visibleStyle,to:a.hiddenStyle,isCleaning:!0,onTransitionEnd:b})},g.prototype.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},g.prototype.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},g}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("outlayer/outlayer",["eventie/eventie","eventEmitter/EventEmitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(c,d,e,f,g){return b(a,c,d,e,f,g)}):"object"==typeof exports?module.exports=b(a,require("eventie"),require("wolfy87-eventemitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):a.Outlayer=b(a,a.eventie,a.EventEmitter,a.getSize,a.fizzyUIUtils,a.Outlayer.Item)}(window,function(a,b,c,d,e,f){"use strict";function g(a,b){var c=e.getQueryElement(a);if(!c)return void(h&&h.error("Bad element for "+this.constructor.namespace+": "+(c||a)));this.element=c,i&&(this.$element=i(this.element)),this.options=e.extend({},this.constructor.defaults),this.option(b);var d=++k;this.element.outlayerGUID=d,l[d]=this,this._create(),this.options.isInitLayout&&this.layout()}var h=a.console,i=a.jQuery,j=function(){},k=0,l={};return g.namespace="outlayer",g.Item=f,g.defaults={containerStyle:{position:"relative"},isInitLayout:!0,isOriginLeft:!0,isOriginTop:!0,isResizeBound:!0,isResizingContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}},e.extend(g.prototype,c.prototype),g.prototype.option=function(a){e.extend(this.options,a)},g.prototype._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),e.extend(this.element.style,this.options.containerStyle),this.options.isResizeBound&&this.bindResize()},g.prototype.reloadItems=function(){this.items=this._itemize(this.element.children)},g.prototype._itemize=function(a){for(var b=this._filterFindItemElements(a),c=this.constructor.Item,d=[],e=0,f=b.length;f>e;e++){var g=b[e],h=new c(g,this);d.push(h)}return d},g.prototype._filterFindItemElements=function(a){return e.filterFindElements(a,this.options.itemSelector)},g.prototype.getItemElements=function(){for(var a=[],b=0,c=this.items.length;c>b;b++)a.push(this.items[b].element);return a},g.prototype.layout=function(){this._resetLayout(),this._manageStamps();var a=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;this.layoutItems(this.items,a),this._isLayoutInited=!0},g.prototype._init=g.prototype.layout,g.prototype._resetLayout=function(){this.getSize()},g.prototype.getSize=function(){this.size=d(this.element)},g.prototype._getMeasurement=function(a,b){var c,f=this.options[a];f?("string"==typeof f?c=this.element.querySelector(f):e.isElement(f)&&(c=f),this[a]=c?d(c)[b]:f):this[a]=0},g.prototype.layoutItems=function(a,b){a=this._getItemsForLayout(a),this._layoutItems(a,b),this._postLayout()},g.prototype._getItemsForLayout=function(a){for(var b=[],c=0,d=a.length;d>c;c++){var e=a[c];e.isIgnored||b.push(e)}return b},g.prototype._layoutItems=function(a,b){if(this._emitCompleteOnItems("layout",a),a&&a.length){for(var c=[],d=0,e=a.length;e>d;d++){var f=a[d],g=this._getItemLayoutPosition(f);g.item=f,g.isInstant=b||f.isLayoutInstant,c.push(g)}this._processLayoutQueue(c)}},g.prototype._getItemLayoutPosition=function(){return{x:0,y:0}},g.prototype._processLayoutQueue=function(a){for(var b=0,c=a.length;c>b;b++){var d=a[b];this._positionItem(d.item,d.x,d.y,d.isInstant)}},g.prototype._positionItem=function(a,b,c,d){d?a.goTo(b,c):a.moveTo(b,c)},g.prototype._postLayout=function(){this.resizeContainer()},g.prototype.resizeContainer=function(){if(this.options.isResizingContainer){var a=this._getContainerSize();a&&(this._setContainerMeasure(a.width,!0),this._setContainerMeasure(a.height,!1))}},g.prototype._getContainerSize=j,g.prototype._setContainerMeasure=function(a,b){if(void 0!==a){var c=this.size;c.isBorderBox&&(a+=b?c.paddingLeft+c.paddingRight+c.borderLeftWidth+c.borderRightWidth:c.paddingBottom+c.paddingTop+c.borderTopWidth+c.borderBottomWidth),a=Math.max(a,0),this.element.style[b?"width":"height"]=a+"px"}},g.prototype._emitCompleteOnItems=function(a,b){function c(){e.dispatchEvent(a+"Complete",null,[b])}function d(){g++,g===f&&c()}var e=this,f=b.length;if(!b||!f)return void c();for(var g=0,h=0,i=b.length;i>h;h++){var j=b[h];j.once(a,d)}},g.prototype.dispatchEvent=function(a,b,c){var d=b?[b].concat(c):c;if(this.emitEvent(a,d),i)if(this.$element=this.$element||i(this.element),b){var e=i.Event(b);e.type=a,this.$element.trigger(e,c)}else this.$element.trigger(a,c)},g.prototype.ignore=function(a){var b=this.getItem(a);b&&(b.isIgnored=!0)},g.prototype.unignore=function(a){var b=this.getItem(a);b&&delete b.isIgnored},g.prototype.stamp=function(a){if(a=this._find(a)){this.stamps=this.stamps.concat(a);for(var b=0,c=a.length;c>b;b++){var d=a[b];this.ignore(d)}}},g.prototype.unstamp=function(a){if(a=this._find(a))for(var b=0,c=a.length;c>b;b++){var d=a[b];e.removeFrom(this.stamps,d),this.unignore(d)}},g.prototype._find=function(a){return a?("string"==typeof a&&(a=this.element.querySelectorAll(a)),a=e.makeArray(a)):void 0},g.prototype._manageStamps=function(){if(this.stamps&&this.stamps.length){this._getBoundingRect();for(var a=0,b=this.stamps.length;b>a;a++){var c=this.stamps[a];this._manageStamp(c)}}},g.prototype._getBoundingRect=function(){var a=this.element.getBoundingClientRect(),b=this.size;this._boundingRect={left:a.left+b.paddingLeft+b.borderLeftWidth,top:a.top+b.paddingTop+b.borderTopWidth,right:a.right-(b.paddingRight+b.borderRightWidth),bottom:a.bottom-(b.paddingBottom+b.borderBottomWidth)}},g.prototype._manageStamp=j,g.prototype._getElementOffset=function(a){var b=a.getBoundingClientRect(),c=this._boundingRect,e=d(a),f={left:b.left-c.left-e.marginLeft,top:b.top-c.top-e.marginTop,right:c.right-b.right-e.marginRight,bottom:c.bottom-b.bottom-e.marginBottom};return f},g.prototype.handleEvent=function(a){var b="on"+a.type;this[b]&&this[b](a)},g.prototype.bindResize=function(){this.isResizeBound||(b.bind(a,"resize",this),this.isResizeBound=!0)},g.prototype.unbindResize=function(){this.isResizeBound&&b.unbind(a,"resize",this),this.isResizeBound=!1},g.prototype.onresize=function(){function a(){b.resize(),delete b.resizeTimeout}this.resizeTimeout&&clearTimeout(this.resizeTimeout);var b=this;this.resizeTimeout=setTimeout(a,100)},g.prototype.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},g.prototype.needsResizeLayout=function(){var a=d(this.element),b=this.size&&a;return b&&a.innerWidth!==this.size.innerWidth},g.prototype.addItems=function(a){var b=this._itemize(a);return b.length&&(this.items=this.items.concat(b)),b},g.prototype.appended=function(a){var b=this.addItems(a);b.length&&(this.layoutItems(b,!0),this.reveal(b))},g.prototype.prepended=function(a){var b=this._itemize(a);if(b.length){var c=this.items.slice(0);this.items=b.concat(c),this._resetLayout(),this._manageStamps(),this.layoutItems(b,!0),this.reveal(b),this.layoutItems(c)}},g.prototype.reveal=function(a){this._emitCompleteOnItems("reveal",a);for(var b=a&&a.length,c=0;b&&b>c;c++){var d=a[c];d.reveal()}},g.prototype.hide=function(a){this._emitCompleteOnItems("hide",a);for(var b=a&&a.length,c=0;b&&b>c;c++){var d=a[c];d.hide()}},g.prototype.revealItemElements=function(a){var b=this.getItems(a);this.reveal(b)},g.prototype.hideItemElements=function(a){var b=this.getItems(a);this.hide(b)},g.prototype.getItem=function(a){for(var b=0,c=this.items.length;c>b;b++){var d=this.items[b];if(d.element===a)return d}},g.prototype.getItems=function(a){a=e.makeArray(a);for(var b=[],c=0,d=a.length;d>c;c++){var f=a[c],g=this.getItem(f);g&&b.push(g)}return b},g.prototype.remove=function(a){var b=this.getItems(a);if(this._emitCompleteOnItems("remove",b),b&&b.length)for(var c=0,d=b.length;d>c;c++){var f=b[c];f.remove(),e.removeFrom(this.items,f)}},g.prototype.destroy=function(){var a=this.element.style;a.height="",a.position="",a.width="";for(var b=0,c=this.items.length;c>b;b++){var d=this.items[b];d.destroy()}this.unbindResize();var e=this.element.outlayerGUID;delete l[e],delete this.element.outlayerGUID,i&&i.removeData(this.element,this.constructor.namespace)},g.data=function(a){a=e.getQueryElement(a);var b=a&&a.outlayerGUID;return b&&l[b]},g.create=function(a,b){function c(){g.apply(this,arguments)}return Object.create?c.prototype=Object.create(g.prototype):e.extend(c.prototype,g.prototype),c.prototype.constructor=c,c.defaults=e.extend({},g.defaults),e.extend(c.defaults,b),c.prototype.settings={},c.namespace=a,c.data=g.data,c.Item=function(){f.apply(this,arguments)},c.Item.prototype=new f,e.htmlInit(c,a),i&&i.bridget&&i.bridget(a,c),c},g.Item=f,g}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("isotope/js/item",["outlayer/outlayer"],b):"object"==typeof exports?module.exports=b(require("outlayer")):(a.Isotope=a.Isotope||{},a.Isotope.Item=b(a.Outlayer))}(window,function(a){"use strict";function b(){a.Item.apply(this,arguments)}b.prototype=new a.Item,b.prototype._create=function(){this.id=this.layout.itemGUID++,a.Item.prototype._create.call(this),this.sortData={}},b.prototype.updateSortData=function(){if(!this.isIgnored){this.sortData.id=this.id,this.sortData["original-order"]=this.id,this.sortData.random=Math.random();var a=this.layout.options.getSortData,b=this.layout._sorters;for(var c in a){var d=b[c];this.sortData[c]=d(this.element,this)}}};var c=b.prototype.destroy;return b.prototype.destroy=function(){c.apply(this,arguments),this.css({display:""})},b}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("isotope/js/layout-mode",["get-size/get-size","outlayer/outlayer"],b):"object"==typeof exports?module.exports=b(require("get-size"),require("outlayer")):(a.Isotope=a.Isotope||{},a.Isotope.LayoutMode=b(a.getSize,a.Outlayer))}(window,function(a,b){"use strict";function c(a){this.isotope=a,a&&(this.options=a.options[this.namespace],this.element=a.element,this.items=a.filteredItems,this.size=a.size)}return function(){function a(a){return function(){return b.prototype[a].apply(this.isotope,arguments)}}for(var d=["_resetLayout","_getItemLayoutPosition","_manageStamp","_getContainerSize","_getElementOffset","needsResizeLayout"],e=0,f=d.length;f>e;e++){var g=d[e];c.prototype[g]=a(g)}}(),c.prototype.needsVerticalResizeLayout=function(){var b=a(this.isotope.element),c=this.isotope.size&&b;return c&&b.innerHeight!=this.isotope.size.innerHeight},c.prototype._getMeasurement=function(){this.isotope._getMeasurement.apply(this,arguments)},c.prototype.getColumnWidth=function(){this.getSegmentSize("column","Width")},c.prototype.getRowHeight=function(){this.getSegmentSize("row","Height")},c.prototype.getSegmentSize=function(a,b){var c=a+b,d="outer"+b;if(this._getMeasurement(c,d),!this[c]){var e=this.getFirstItemSize();this[c]=e&&e[d]||this.isotope.size["inner"+b]}},c.prototype.getFirstItemSize=function(){var b=this.isotope.filteredItems[0];return b&&b.element&&a(b.element)},c.prototype.layout=function(){this.isotope.layout.apply(this.isotope,arguments)},c.prototype.getSize=function(){this.isotope.getSize(),this.size=this.isotope.size},c.modes={},c.create=function(a,b){function d(){c.apply(this,arguments)}return d.prototype=new c,b&&(d.options=b),d.prototype.namespace=a,c.modes[a]=d,d},c}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("masonry/masonry",["outlayer/outlayer","get-size/get-size","fizzy-ui-utils/utils"],b):"object"==typeof exports?module.exports=b(require("outlayer"),require("get-size"),require("fizzy-ui-utils")):a.Masonry=b(a.Outlayer,a.getSize,a.fizzyUIUtils)}(window,function(a,b,c){var d=a.create("masonry");return d.prototype._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns();var a=this.cols;for(this.colYs=[];a--;)this.colYs.push(0);this.maxY=0},d.prototype.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var a=this.items[0],c=a&&a.element;this.columnWidth=c&&b(c).outerWidth||this.containerWidth}var d=this.columnWidth+=this.gutter,e=this.containerWidth+this.gutter,f=e/d,g=d-e%d,h=g&&1>g?"round":"floor";f=Math[h](f),this.cols=Math.max(f,1)},d.prototype.getContainerWidth=function(){var a=this.options.isFitWidth?this.element.parentNode:this.element,c=b(a);this.containerWidth=c&&c.innerWidth},d.prototype._getItemLayoutPosition=function(a){a.getSize();var b=a.size.outerWidth%this.columnWidth,d=b&&1>b?"round":"ceil",e=Math[d](a.size.outerWidth/this.columnWidth);e=Math.min(e,this.cols);for(var f=this._getColGroup(e),g=Math.min.apply(Math,f),h=c.indexOf(f,g),i={x:this.columnWidth*h,y:g},j=g+a.size.outerHeight,k=this.cols+1-f.length,l=0;k>l;l++)this.colYs[h+l]=j;return i},d.prototype._getColGroup=function(a){if(2>a)return this.colYs;for(var b=[],c=this.cols+1-a,d=0;c>d;d++){var e=this.colYs.slice(d,d+a);b[d]=Math.max.apply(Math,e)}return b},d.prototype._manageStamp=function(a){var c=b(a),d=this._getElementOffset(a),e=this.options.isOriginLeft?d.left:d.right,f=e+c.outerWidth,g=Math.floor(e/this.columnWidth);g=Math.max(0,g);var h=Math.floor(f/this.columnWidth);h-=f%this.columnWidth?0:1,h=Math.min(this.cols-1,h);for(var i=(this.options.isOriginTop?d.top:d.bottom)+c.outerHeight,j=g;h>=j;j++)this.colYs[j]=Math.max(i,this.colYs[j])},d.prototype._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var a={height:this.maxY};return this.options.isFitWidth&&(a.width=this._getContainerFitWidth()),a},d.prototype._getContainerFitWidth=function(){for(var a=0,b=this.cols;--b&&0===this.colYs[b];)a++;return(this.cols-a)*this.columnWidth-this.gutter},d.prototype.needsResizeLayout=function(){var a=this.containerWidth;return this.getContainerWidth(),a!==this.containerWidth},d}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("isotope/js/layout-modes/masonry",["../layout-mode","masonry/masonry"],b):"object"==typeof exports?module.exports=b(require("../layout-mode"),require("masonry-layout")):b(a.Isotope.LayoutMode,a.Masonry)}(window,function(a,b){"use strict";function c(a,b){for(var c in b)a[c]=b[c];return a}var d=a.create("masonry"),e=d.prototype._getElementOffset,f=d.prototype.layout,g=d.prototype._getMeasurement;
c(d.prototype,b.prototype),d.prototype._getElementOffset=e,d.prototype.layout=f,d.prototype._getMeasurement=g;var h=d.prototype.measureColumns;d.prototype.measureColumns=function(){this.items=this.isotope.filteredItems,h.call(this)};var i=d.prototype._manageStamp;return d.prototype._manageStamp=function(){this.options.isOriginLeft=this.isotope.options.isOriginLeft,this.options.isOriginTop=this.isotope.options.isOriginTop,i.apply(this,arguments)},d}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("isotope/js/layout-modes/fit-rows",["../layout-mode"],b):"object"==typeof exports?module.exports=b(require("../layout-mode")):b(a.Isotope.LayoutMode)}(window,function(a){"use strict";var b=a.create("fitRows");return b.prototype._resetLayout=function(){this.x=0,this.y=0,this.maxY=0,this._getMeasurement("gutter","outerWidth")},b.prototype._getItemLayoutPosition=function(a){a.getSize();var b=a.size.outerWidth+this.gutter,c=this.isotope.size.innerWidth+this.gutter;0!==this.x&&b+this.x>c&&(this.x=0,this.y=this.maxY);var d={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+a.size.outerHeight),this.x+=b,d},b.prototype._getContainerSize=function(){return{height:this.maxY}},b}),function(a,b){"use strict";"function"==typeof define&&define.amd?define("isotope/js/layout-modes/vertical",["../layout-mode"],b):"object"==typeof exports?module.exports=b(require("../layout-mode")):b(a.Isotope.LayoutMode)}(window,function(a){"use strict";var b=a.create("vertical",{horizontalAlignment:0});return b.prototype._resetLayout=function(){this.y=0},b.prototype._getItemLayoutPosition=function(a){a.getSize();var b=(this.isotope.size.innerWidth-a.size.outerWidth)*this.options.horizontalAlignment,c=this.y;return this.y+=a.size.outerHeight,{x:b,y:c}},b.prototype._getContainerSize=function(){return{height:this.y}},b}),function(a,b){"use strict";"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size","matches-selector/matches-selector","fizzy-ui-utils/utils","isotope/js/item","isotope/js/layout-mode","isotope/js/layout-modes/masonry","isotope/js/layout-modes/fit-rows","isotope/js/layout-modes/vertical"],function(c,d,e,f,g,h){return b(a,c,d,e,f,g,h)}):"object"==typeof exports?module.exports=b(a,require("outlayer"),require("get-size"),require("desandro-matches-selector"),require("fizzy-ui-utils"),require("./item"),require("./layout-mode"),require("./layout-modes/masonry"),require("./layout-modes/fit-rows"),require("./layout-modes/vertical")):a.Isotope=b(a,a.Outlayer,a.getSize,a.matchesSelector,a.fizzyUIUtils,a.Isotope.Item,a.Isotope.LayoutMode)}(window,function(a,b,c,d,e,f,g){function h(a,b){return function(c,d){for(var e=0,f=a.length;f>e;e++){var g=a[e],h=c.sortData[g],i=d.sortData[g];if(h>i||i>h){var j=void 0!==b[g]?b[g]:b,k=j?1:-1;return(h>i?1:-1)*k}}return 0}}var i=a.jQuery,j=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^\s+|\s+$/g,"")},k=document.documentElement,l=k.textContent?function(a){return a.textContent}:function(a){return a.innerText},m=b.create("isotope",{layoutMode:"masonry",isJQueryFiltering:!0,sortAscending:!0});m.Item=f,m.LayoutMode=g,m.prototype._create=function(){this.itemGUID=0,this._sorters={},this._getSorters(),b.prototype._create.call(this),this.modes={},this.filteredItems=this.items,this.sortHistory=["original-order"];for(var a in g.modes)this._initLayoutMode(a)},m.prototype.reloadItems=function(){this.itemGUID=0,b.prototype.reloadItems.call(this)},m.prototype._itemize=function(){for(var a=b.prototype._itemize.apply(this,arguments),c=0,d=a.length;d>c;c++){var e=a[c];e.id=this.itemGUID++}return this._updateItemsSortData(a),a},m.prototype._initLayoutMode=function(a){var b=g.modes[a],c=this.options[a]||{};this.options[a]=b.options?e.extend(b.options,c):c,this.modes[a]=new b(this)},m.prototype.layout=function(){return!this._isLayoutInited&&this.options.isInitLayout?void this.arrange():void this._layout()},m.prototype._layout=function(){var a=this._getIsInstant();this._resetLayout(),this._manageStamps(),this.layoutItems(this.filteredItems,a),this._isLayoutInited=!0},m.prototype.arrange=function(a){function b(){d.reveal(c.needReveal),d.hide(c.needHide)}this.option(a),this._getIsInstant();var c=this._filter(this.items);this.filteredItems=c.matches;var d=this;this._bindArrangeComplete(),this._isInstant?this._noTransition(b):b(),this._sort(),this._layout()},m.prototype._init=m.prototype.arrange,m.prototype._getIsInstant=function(){var a=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;return this._isInstant=a,a},m.prototype._bindArrangeComplete=function(){function a(){b&&c&&d&&e.dispatchEvent("arrangeComplete",null,[e.filteredItems])}var b,c,d,e=this;this.once("layoutComplete",function(){b=!0,a()}),this.once("hideComplete",function(){c=!0,a()}),this.once("revealComplete",function(){d=!0,a()})},m.prototype._filter=function(a){var b=this.options.filter;b=b||"*";for(var c=[],d=[],e=[],f=this._getFilterTest(b),g=0,h=a.length;h>g;g++){var i=a[g];if(!i.isIgnored){var j=f(i);j&&c.push(i),j&&i.isHidden?d.push(i):j||i.isHidden||e.push(i)}}return{matches:c,needReveal:d,needHide:e}},m.prototype._getFilterTest=function(a){return i&&this.options.isJQueryFiltering?function(b){return i(b.element).is(a)}:"function"==typeof a?function(b){return a(b.element)}:function(b){return d(b.element,a)}},m.prototype.updateSortData=function(a){var b;a?(a=e.makeArray(a),b=this.getItems(a)):b=this.items,this._getSorters(),this._updateItemsSortData(b)},m.prototype._getSorters=function(){var a=this.options.getSortData;for(var b in a){var c=a[b];this._sorters[b]=n(c)}},m.prototype._updateItemsSortData=function(a){for(var b=a&&a.length,c=0;b&&b>c;c++){var d=a[c];d.updateSortData()}};var n=function(){function a(a){if("string"!=typeof a)return a;var c=j(a).split(" "),d=c[0],e=d.match(/^\[(.+)\]$/),f=e&&e[1],g=b(f,d),h=m.sortDataParsers[c[1]];return a=h?function(a){return a&&h(g(a))}:function(a){return a&&g(a)}}function b(a,b){var c;return c=a?function(b){return b.getAttribute(a)}:function(a){var c=a.querySelector(b);return c&&l(c)}}return a}();m.sortDataParsers={parseInt:function(a){return parseInt(a,10)},parseFloat:function(a){return parseFloat(a)}},m.prototype._sort=function(){var a=this.options.sortBy;if(a){var b=[].concat.apply(a,this.sortHistory),c=h(b,this.options.sortAscending);this.filteredItems.sort(c),a!=this.sortHistory[0]&&this.sortHistory.unshift(a)}},m.prototype._mode=function(){var a=this.options.layoutMode,b=this.modes[a];if(!b)throw new Error("No layout mode: "+a);return b.options=this.options[a],b},m.prototype._resetLayout=function(){b.prototype._resetLayout.call(this),this._mode()._resetLayout()},m.prototype._getItemLayoutPosition=function(a){return this._mode()._getItemLayoutPosition(a)},m.prototype._manageStamp=function(a){this._mode()._manageStamp(a)},m.prototype._getContainerSize=function(){return this._mode()._getContainerSize()},m.prototype.needsResizeLayout=function(){return this._mode().needsResizeLayout()},m.prototype.appended=function(a){var b=this.addItems(a);if(b.length){var c=this._filterRevealAdded(b);this.filteredItems=this.filteredItems.concat(c)}},m.prototype.prepended=function(a){var b=this._itemize(a);if(b.length){this._resetLayout(),this._manageStamps();var c=this._filterRevealAdded(b);this.layoutItems(this.filteredItems),this.filteredItems=c.concat(this.filteredItems),this.items=b.concat(this.items)}},m.prototype._filterRevealAdded=function(a){var b=this._filter(a);return this.hide(b.needHide),this.reveal(b.matches),this.layoutItems(b.matches,!0),b.matches},m.prototype.insert=function(a){var b=this.addItems(a);if(b.length){var c,d,e=b.length;for(c=0;e>c;c++)d=b[c],this.element.appendChild(d.element);var f=this._filter(b).matches;for(c=0;e>c;c++)b[c].isLayoutInstant=!0;for(this.arrange(),c=0;e>c;c++)delete b[c].isLayoutInstant;this.reveal(f)}};var o=m.prototype.remove;return m.prototype.remove=function(a){a=e.makeArray(a);var b=this.getItems(a);o.call(this,a);var c=b&&b.length;if(c)for(var d=0;c>d;d++){var f=b[d];e.removeFrom(this.filteredItems,f)}},m.prototype.shuffle=function(){for(var a=0,b=this.items.length;b>a;a++){var c=this.items[a];c.sortData.random=Math.random()}this.options.sortBy="random",this._sort(),this._layout()},m.prototype._noTransition=function(a){var b=this.options.transitionDuration;this.options.transitionDuration=0;var c=a.call(this);return this.options.transitionDuration=b,c},m.prototype.getFilteredItemElements=function(){for(var a=[],b=0,c=this.filteredItems.length;c>b;b++)a.push(this.filteredItems[b].element);return a},m});
/*!
 * imagesLoaded PACKAGED v3.2.0
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function(){"use strict";function e(){}function t(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}function n(e){return function(){return this[e].apply(this,arguments)}}var i=e.prototype,r=this,s=r.EventEmitter;i.getListeners=function(e){var t,n,i=this._getEvents();if("object"==typeof e){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},i.flattenListeners=function(e){var t,n=[];for(t=0;t<e.length;t+=1)n.push(e[t].listener);return n},i.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},i.addListener=function(e,n){var i,r=this.getListenersAsObject(e),s="object"==typeof n;for(i in r)r.hasOwnProperty(i)&&-1===t(r[i],n)&&r[i].push(s?n:{listener:n,once:!1});return this},i.on=n("addListener"),i.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},i.once=n("addOnceListener"),i.defineEvent=function(e){return this.getListeners(e),this},i.defineEvents=function(e){for(var t=0;t<e.length;t+=1)this.defineEvent(e[t]);return this},i.removeListener=function(e,n){var i,r,s=this.getListenersAsObject(e);for(r in s)s.hasOwnProperty(r)&&(i=t(s[r],n),-1!==i&&s[r].splice(i,1));return this},i.off=n("removeListener"),i.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},i.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},i.manipulateListeners=function(e,t,n){var i,r,s=e?this.removeListener:this.addListener,o=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)s.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?s.call(this,i,r):o.call(this,i,r));return this},i.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if("object"===n)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},i.removeAllListeners=n("removeEvent"),i.emitEvent=function(e,t){var n,i,r,s,o=this.getListenersAsObject(e);for(r in o)if(o.hasOwnProperty(r))for(i=o[r].length;i--;)n=o[r][i],n.once===!0&&this.removeListener(e,n.listener),s=n.listener.apply(this,t||[]),s===this._getOnceReturnValue()&&this.removeListener(e,n.listener);return this},i.trigger=n("emitEvent"),i.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},i.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},i._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},i._getEvents=function(){return this._events||(this._events={})},e.noConflict=function(){return r.EventEmitter=s,e},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return e}):"object"==typeof module&&module.exports?module.exports=e:this.EventEmitter=e}).call(this),function(e){function t(t){var n=e.event;return n.target=n.target||n.srcElement||t,n}var n=document.documentElement,i=function(){};n.addEventListener?i=function(e,t,n){e.addEventListener(t,n,!1)}:n.attachEvent&&(i=function(e,n,i){e[n+i]=i.handleEvent?function(){var n=t(e);i.handleEvent.call(i,n)}:function(){var n=t(e);i.call(e,n)},e.attachEvent("on"+n,e[n+i])});var r=function(){};n.removeEventListener?r=function(e,t,n){e.removeEventListener(t,n,!1)}:n.detachEvent&&(r=function(e,t,n){e.detachEvent("on"+t,e[t+n]);try{delete e[t+n]}catch(i){e[t+n]=void 0}});var s={bind:i,unbind:r};"function"==typeof define&&define.amd?define("eventie/eventie",s):e.eventie=s}(this),function(e,t){"use strict";"function"==typeof define&&define.amd?define(["eventEmitter/EventEmitter","eventie/eventie"],function(n,i){return t(e,n,i)}):"object"==typeof module&&module.exports?module.exports=t(e,require("wolfy87-eventemitter"),require("eventie")):e.imagesLoaded=t(e,e.EventEmitter,e.eventie)}(window,function(e,t,n){function i(e,t){for(var n in t)e[n]=t[n];return e}function r(e){return"[object Array]"==f.call(e)}function s(e){var t=[];if(r(e))t=e;else if("number"==typeof e.length)for(var n=0;n<e.length;n++)t.push(e[n]);else t.push(e);return t}function o(e,t,n){if(!(this instanceof o))return new o(e,t,n);"string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=s(e),this.options=i({},this.options),"function"==typeof t?n=t:i(this.options,t),n&&this.on("always",n),this.getImages(),u&&(this.jqDeferred=new u.Deferred);var r=this;setTimeout(function(){r.check()})}function h(e){this.img=e}function a(e,t){this.url=e,this.element=t,this.img=new Image}var u=e.jQuery,c=e.console,f=Object.prototype.toString;o.prototype=new t,o.prototype.options={},o.prototype.getImages=function(){this.images=[];for(var e=0;e<this.elements.length;e++){var t=this.elements[e];this.addElementImages(t)}},o.prototype.addElementImages=function(e){"IMG"==e.nodeName&&this.addImage(e),this.options.background===!0&&this.addElementBackgroundImages(e);var t=e.nodeType;if(t&&d[t]){for(var n=e.querySelectorAll("img"),i=0;i<n.length;i++){var r=n[i];this.addImage(r)}if("string"==typeof this.options.background){var s=e.querySelectorAll(this.options.background);for(i=0;i<s.length;i++){var o=s[i];this.addElementBackgroundImages(o)}}}};var d={1:!0,9:!0,11:!0};o.prototype.addElementBackgroundImages=function(e){for(var t=m(e),n=/url\(['"]*([^'"\)]+)['"]*\)/gi,i=n.exec(t.backgroundImage);null!==i;){var r=i&&i[1];r&&this.addBackground(r,e),i=n.exec(t.backgroundImage)}};var m=e.getComputedStyle||function(e){return e.currentStyle};return o.prototype.addImage=function(e){var t=new h(e);this.images.push(t)},o.prototype.addBackground=function(e,t){var n=new a(e,t);this.images.push(n)},o.prototype.check=function(){function e(e,n,i){setTimeout(function(){t.progress(e,n,i)})}var t=this;if(this.progressedCount=0,this.hasAnyBroken=!1,!this.images.length)return void this.complete();for(var n=0;n<this.images.length;n++){var i=this.images[n];i.once("progress",e),i.check()}},o.prototype.progress=function(e,t,n){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded,this.emit("progress",this,e,t),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,e),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&c&&c.log("progress: "+n,e,t)},o.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emit(e,this),this.emit("always",this),this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}},h.prototype=new t,h.prototype.check=function(){var e=this.getIsImageComplete();return e?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,n.bind(this.proxyImage,"load",this),n.bind(this.proxyImage,"error",this),n.bind(this.img,"load",this),n.bind(this.img,"error",this),void(this.proxyImage.src=this.img.src))},h.prototype.getIsImageComplete=function(){return this.img.complete&&void 0!==this.img.naturalWidth},h.prototype.confirm=function(e,t){this.isLoaded=e,this.emit("progress",this,this.img,t)},h.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},h.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},h.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},h.prototype.unbindEvents=function(){n.unbind(this.proxyImage,"load",this),n.unbind(this.proxyImage,"error",this),n.unbind(this.img,"load",this),n.unbind(this.img,"error",this)},a.prototype=new h,a.prototype.check=function(){n.bind(this.img,"load",this),n.bind(this.img,"error",this),this.img.src=this.url;var e=this.getIsImageComplete();e&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},a.prototype.unbindEvents=function(){n.unbind(this.img,"load",this),n.unbind(this.img,"error",this)},a.prototype.confirm=function(e,t){this.isLoaded=e,this.emit("progress",this,this.element,t)},o.makeJQueryPlugin=function(t){t=t||e.jQuery,t&&(u=t,u.fn.imagesLoaded=function(e,t){var n=new o(this,e,t);return n.jqDeferred.promise(u(this))})},o.makeJQueryPlugin(),o});
var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera",
			versionSearch: "Version"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
BrowserDetect.init();
;(function () {
	'use strict';

	/**
	 * @preserve FastClick: polyfill to remove click delays on browsers with touch UIs.
	 *
	 * @codingstandard ftlabs-jsv2
	 * @copyright The Financial Times Limited [All Rights Reserved]
	 * @license MIT License (see LICENSE.txt)
	 */

	/*jslint browser:true, node:true*/
	/*global define, Event, Node*/


	/**
	 * Instantiate fast-clicking listeners on the specified layer.
	 *
	 * @constructor
	 * @param {Element} layer The layer to listen on
	 * @param {Object} [options={}] The options to override the defaults
	 */
	function FastClick(layer, options) {
		var oldOnClick;

		options = options || {};

		/**
		 * Whether a click is currently being tracked.
		 *
		 * @type boolean
		 */
		this.trackingClick = false;


		/**
		 * Timestamp for when click tracking started.
		 *
		 * @type number
		 */
		this.trackingClickStart = 0;


		/**
		 * The element being tracked for a click.
		 *
		 * @type EventTarget
		 */
		this.targetElement = null;


		/**
		 * X-coordinate of touch start event.
		 *
		 * @type number
		 */
		this.touchStartX = 0;


		/**
		 * Y-coordinate of touch start event.
		 *
		 * @type number
		 */
		this.touchStartY = 0;


		/**
		 * ID of the last touch, retrieved from Touch.identifier.
		 *
		 * @type number
		 */
		this.lastTouchIdentifier = 0;


		/**
		 * Touchmove boundary, beyond which a click will be cancelled.
		 *
		 * @type number
		 */
		this.touchBoundary = options.touchBoundary || 10;


		/**
		 * The FastClick layer.
		 *
		 * @type Element
		 */
		this.layer = layer;

		/**
		 * The minimum time between tap(touchstart and touchend) events
		 *
		 * @type number
		 */
		this.tapDelay = options.tapDelay || 200;

		/**
		 * The maximum time for a tap
		 *
		 * @type number
		 */
		this.tapTimeout = options.tapTimeout || 700;

		if (FastClick.notNeeded(layer)) {
			return;
		}

		// Some old versions of Android don't have Function.prototype.bind
		function bind(method, context) {
			return function() { return method.apply(context, arguments); };
		}


		var methods = ['onMouse', 'onClick', 'onTouchStart', 'onTouchMove', 'onTouchEnd', 'onTouchCancel'];
		var context = this;
		for (var i = 0, l = methods.length; i < l; i++) {
			context[methods[i]] = bind(context[methods[i]], context);
		}

		// Set up event handlers as required
		if (deviceIsAndroid) {
			layer.addEventListener('mouseover', this.onMouse, true);
			layer.addEventListener('mousedown', this.onMouse, true);
			layer.addEventListener('mouseup', this.onMouse, true);
		}

		layer.addEventListener('click', this.onClick, true);
		layer.addEventListener('touchstart', this.onTouchStart, false);
		layer.addEventListener('touchmove', this.onTouchMove, false);
		layer.addEventListener('touchend', this.onTouchEnd, false);
		layer.addEventListener('touchcancel', this.onTouchCancel, false);

		// Hack is required for browsers that don't support Event#stopImmediatePropagation (e.g. Android 2)
		// which is how FastClick normally stops click events bubbling to callbacks registered on the FastClick
		// layer when they are cancelled.
		if (!Event.prototype.stopImmediatePropagation) {
			layer.removeEventListener = function(type, callback, capture) {
				var rmv = Node.prototype.removeEventListener;
				if (type === 'click') {
					rmv.call(layer, type, callback.hijacked || callback, capture);
				} else {
					rmv.call(layer, type, callback, capture);
				}
			};

			layer.addEventListener = function(type, callback, capture) {
				var adv = Node.prototype.addEventListener;
				if (type === 'click') {
					adv.call(layer, type, callback.hijacked || (callback.hijacked = function(event) {
						if (!event.propagationStopped) {
							callback(event);
						}
					}), capture);
				} else {
					adv.call(layer, type, callback, capture);
				}
			};
		}

		// If a handler is already declared in the element's onclick attribute, it will be fired before
		// FastClick's onClick handler. Fix this by pulling out the user-defined handler function and
		// adding it as listener.
		if (typeof layer.onclick === 'function') {

			// Android browser on at least 3.2 requires a new reference to the function in layer.onclick
			// - the old one won't work if passed to addEventListener directly.
			oldOnClick = layer.onclick;
			layer.addEventListener('click', function(event) {
				oldOnClick(event);
			}, false);
			layer.onclick = null;
		}
	}

	/**
	* Windows Phone 8.1 fakes user agent string to look like Android and iPhone.
	*
	* @type boolean
	*/
	var deviceIsWindowsPhone = navigator.userAgent.indexOf("Windows Phone") >= 0;

	/**
	 * Android requires exceptions.
	 *
	 * @type boolean
	 */
	var deviceIsAndroid = navigator.userAgent.indexOf('Android') > 0 && !deviceIsWindowsPhone;


	/**
	 * iOS requires exceptions.
	 *
	 * @type boolean
	 */
	var deviceIsIOS = /iP(ad|hone|od)/.test(navigator.userAgent) && !deviceIsWindowsPhone;


	/**
	 * iOS 4 requires an exception for select elements.
	 *
	 * @type boolean
	 */
	var deviceIsIOS4 = deviceIsIOS && (/OS 4_\d(_\d)?/).test(navigator.userAgent);


	/**
	 * iOS 6.0-7.* requires the target element to be manually derived
	 *
	 * @type boolean
	 */
	var deviceIsIOSWithBadTarget = deviceIsIOS && (/OS [6-7]_\d/).test(navigator.userAgent);

	/**
	 * BlackBerry requires exceptions.
	 *
	 * @type boolean
	 */
	var deviceIsBlackBerry10 = navigator.userAgent.indexOf('BB10') > 0;

	/**
	 * Determine whether a given element requires a native click.
	 *
	 * @param {EventTarget|Element} target Target DOM element
	 * @returns {boolean} Returns true if the element needs a native click
	 */
	FastClick.prototype.needsClick = function(target) {
		switch (target.nodeName.toLowerCase()) {

		// Don't send a synthetic click to disabled inputs (issue #62)
		case 'button':
		case 'select':
		case 'textarea':
			if (target.disabled) {
				return true;
			}

			break;
		case 'input':

			// File inputs need real clicks on iOS 6 due to a browser bug (issue #68)
			if ((deviceIsIOS && target.type === 'file') || target.disabled) {
				return true;
			}

			break;
		case 'label':
		case 'iframe': // iOS8 homescreen apps can prevent events bubbling into frames
		case 'video':
			return true;
		}

		return (/\bneedsclick\b/).test(target.className);
	};


	/**
	 * Determine whether a given element requires a call to focus to simulate click into element.
	 *
	 * @param {EventTarget|Element} target Target DOM element
	 * @returns {boolean} Returns true if the element requires a call to focus to simulate native click.
	 */
	FastClick.prototype.needsFocus = function(target) {
		switch (target.nodeName.toLowerCase()) {
		case 'textarea':
			return true;
		case 'select':
			return !deviceIsAndroid;
		case 'input':
			switch (target.type) {
			case 'button':
			case 'checkbox':
			case 'file':
			case 'image':
			case 'radio':
			case 'submit':
				return false;
			}

			// No point in attempting to focus disabled inputs
			return !target.disabled && !target.readOnly;
		default:
			return (/\bneedsfocus\b/).test(target.className);
		}
	};


	/**
	 * Send a click event to the specified element.
	 *
	 * @param {EventTarget|Element} targetElement
	 * @param {Event} event
	 */
	FastClick.prototype.sendClick = function(targetElement, event) {
		var clickEvent, touch;

		// On some Android devices activeElement needs to be blurred otherwise the synthetic click will have no effect (#24)
		if (document.activeElement && document.activeElement !== targetElement) {
			document.activeElement.blur();
		}

		touch = event.changedTouches[0];

		// Synthesise a click event, with an extra attribute so it can be tracked
		clickEvent = document.createEvent('MouseEvents');
		clickEvent.initMouseEvent(this.determineEventType(targetElement), true, true, window, 1, touch.screenX, touch.screenY, touch.clientX, touch.clientY, false, false, false, false, 0, null);
		clickEvent.forwardedTouchEvent = true;
		targetElement.dispatchEvent(clickEvent);
	};

	FastClick.prototype.determineEventType = function(targetElement) {

		//Issue #159: Android Chrome Select Box does not open with a synthetic click event
		if (deviceIsAndroid && targetElement.tagName.toLowerCase() === 'select') {
			return 'mousedown';
		}

		return 'click';
	};


	/**
	 * @param {EventTarget|Element} targetElement
	 */
	FastClick.prototype.focus = function(targetElement) {
		var length;

		// Issue #160: on iOS 7, some input elements (e.g. date datetime month) throw a vague TypeError on setSelectionRange. These elements don't have an integer value for the selectionStart and selectionEnd properties, but unfortunately that can't be used for detection because accessing the properties also throws a TypeError. Just check the type instead. Filed as Apple bug #15122724.
		if (deviceIsIOS && targetElement.setSelectionRange && targetElement.type.indexOf('date') !== 0 && targetElement.type !== 'time' && targetElement.type !== 'month') {
			length = targetElement.value.length;
			targetElement.setSelectionRange(length, length);
		} else {
			targetElement.focus();
		}
	};


	/**
	 * Check whether the given target element is a child of a scrollable layer and if so, set a flag on it.
	 *
	 * @param {EventTarget|Element} targetElement
	 */
	FastClick.prototype.updateScrollParent = function(targetElement) {
		var scrollParent, parentElement;

		scrollParent = targetElement.fastClickScrollParent;

		// Attempt to discover whether the target element is contained within a scrollable layer. Re-check if the
		// target element was moved to another parent.
		if (!scrollParent || !scrollParent.contains(targetElement)) {
			parentElement = targetElement;
			do {
				if (parentElement.scrollHeight > parentElement.offsetHeight) {
					scrollParent = parentElement;
					targetElement.fastClickScrollParent = parentElement;
					break;
				}

				parentElement = parentElement.parentElement;
			} while (parentElement);
		}

		// Always update the scroll top tracker if possible.
		if (scrollParent) {
			scrollParent.fastClickLastScrollTop = scrollParent.scrollTop;
		}
	};


	/**
	 * @param {EventTarget} targetElement
	 * @returns {Element|EventTarget}
	 */
	FastClick.prototype.getTargetElementFromEventTarget = function(eventTarget) {

		// On some older browsers (notably Safari on iOS 4.1 - see issue #56) the event target may be a text node.
		if (eventTarget.nodeType === Node.TEXT_NODE) {
			return eventTarget.parentNode;
		}

		return eventTarget;
	};


	/**
	 * On touch start, record the position and scroll offset.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onTouchStart = function(event) {
		var targetElement, touch, selection;

		// Ignore multiple touches, otherwise pinch-to-zoom is prevented if both fingers are on the FastClick element (issue #111).
		if (event.targetTouches.length > 1) {
			return true;
		}

		targetElement = this.getTargetElementFromEventTarget(event.target);
		touch = event.targetTouches[0];

		if (deviceIsIOS) {

			// Only trusted events will deselect text on iOS (issue #49)
			selection = window.getSelection();
			if (selection.rangeCount && !selection.isCollapsed) {
				return true;
			}

			if (!deviceIsIOS4) {

				// Weird things happen on iOS when an alert or confirm dialog is opened from a click event callback (issue #23):
				// when the user next taps anywhere else on the page, new touchstart and touchend events are dispatched
				// with the same identifier as the touch event that previously triggered the click that triggered the alert.
				// Sadly, there is an issue on iOS 4 that causes some normal touch events to have the same identifier as an
				// immediately preceeding touch event (issue #52), so this fix is unavailable on that platform.
				// Issue 120: touch.identifier is 0 when Chrome dev tools 'Emulate touch events' is set with an iOS device UA string,
				// which causes all touch events to be ignored. As this block only applies to iOS, and iOS identifiers are always long,
				// random integers, it's safe to to continue if the identifier is 0 here.
				if (touch.identifier && touch.identifier === this.lastTouchIdentifier) {
					event.preventDefault();
					return false;
				}

				this.lastTouchIdentifier = touch.identifier;

				// If the target element is a child of a scrollable layer (using -webkit-overflow-scrolling: touch) and:
				// 1) the user does a fling scroll on the scrollable layer
				// 2) the user stops the fling scroll with another tap
				// then the event.target of the last 'touchend' event will be the element that was under the user's finger
				// when the fling scroll was started, causing FastClick to send a click event to that layer - unless a check
				// is made to ensure that a parent layer was not scrolled before sending a synthetic click (issue #42).
				this.updateScrollParent(targetElement);
			}
		}

		this.trackingClick = true;
		this.trackingClickStart = event.timeStamp;
		this.targetElement = targetElement;

		this.touchStartX = touch.pageX;
		this.touchStartY = touch.pageY;

		// Prevent phantom clicks on fast double-tap (issue #36)
		if ((event.timeStamp - this.lastClickTime) < this.tapDelay) {
			event.preventDefault();
		}

		return true;
	};


	/**
	 * Based on a touchmove event object, check whether the touch has moved past a boundary since it started.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.touchHasMoved = function(event) {
		var touch = event.changedTouches[0], boundary = this.touchBoundary;

		if (Math.abs(touch.pageX - this.touchStartX) > boundary || Math.abs(touch.pageY - this.touchStartY) > boundary) {
			return true;
		}

		return false;
	};


	/**
	 * Update the last position.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onTouchMove = function(event) {
		if (!this.trackingClick) {
			return true;
		}

		// If the touch has moved, cancel the click tracking
		if (this.targetElement !== this.getTargetElementFromEventTarget(event.target) || this.touchHasMoved(event)) {
			this.trackingClick = false;
			this.targetElement = null;
		}

		return true;
	};


	/**
	 * Attempt to find the labelled control for the given label element.
	 *
	 * @param {EventTarget|HTMLLabelElement} labelElement
	 * @returns {Element|null}
	 */
	FastClick.prototype.findControl = function(labelElement) {

		// Fast path for newer browsers supporting the HTML5 control attribute
		if (labelElement.control !== undefined) {
			return labelElement.control;
		}

		// All browsers under test that support touch events also support the HTML5 htmlFor attribute
		if (labelElement.htmlFor) {
			return document.getElementById(labelElement.htmlFor);
		}

		// If no for attribute exists, attempt to retrieve the first labellable descendant element
		// the list of which is defined here: http://www.w3.org/TR/html5/forms.html#category-label
		return labelElement.querySelector('button, input:not([type=hidden]), keygen, meter, output, progress, select, textarea');
	};


	/**
	 * On touch end, determine whether to send a click event at once.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onTouchEnd = function(event) {
		var forElement, trackingClickStart, targetTagName, scrollParent, touch, targetElement = this.targetElement;

		if (!this.trackingClick) {
			return true;
		}

		// Prevent phantom clicks on fast double-tap (issue #36)
		if ((event.timeStamp - this.lastClickTime) < this.tapDelay) {
			this.cancelNextClick = true;
			return true;
		}

		if ((event.timeStamp - this.trackingClickStart) > this.tapTimeout) {
			return true;
		}

		// Reset to prevent wrong click cancel on input (issue #156).
		this.cancelNextClick = false;

		this.lastClickTime = event.timeStamp;

		trackingClickStart = this.trackingClickStart;
		this.trackingClick = false;
		this.trackingClickStart = 0;

		// On some iOS devices, the targetElement supplied with the event is invalid if the layer
		// is performing a transition or scroll, and has to be re-detected manually. Note that
		// for this to function correctly, it must be called *after* the event target is checked!
		// See issue #57; also filed as rdar://13048589 .
		if (deviceIsIOSWithBadTarget) {
			touch = event.changedTouches[0];

			// In certain cases arguments of elementFromPoint can be negative, so prevent setting targetElement to null
			targetElement = document.elementFromPoint(touch.pageX - window.pageXOffset, touch.pageY - window.pageYOffset) || targetElement;
			targetElement.fastClickScrollParent = this.targetElement.fastClickScrollParent;
		}

		targetTagName = targetElement.tagName.toLowerCase();
		if (targetTagName === 'label') {
			forElement = this.findControl(targetElement);
			if (forElement) {
				this.focus(targetElement);
				if (deviceIsAndroid) {
					return false;
				}

				targetElement = forElement;
			}
		} else if (this.needsFocus(targetElement)) {

			// Case 1: If the touch started a while ago (best guess is 100ms based on tests for issue #36) then focus will be triggered anyway. Return early and unset the target element reference so that the subsequent click will be allowed through.
			// Case 2: Without this exception for input elements tapped when the document is contained in an iframe, then any inputted text won't be visible even though the value attribute is updated as the user types (issue #37).
			if ((event.timeStamp - trackingClickStart) > 100 || (deviceIsIOS && window.top !== window && targetTagName === 'input')) {
				this.targetElement = null;
				return false;
			}

			this.focus(targetElement);
			this.sendClick(targetElement, event);

			// Select elements need the event to go through on iOS 4, otherwise the selector menu won't open.
			// Also this breaks opening selects when VoiceOver is active on iOS6, iOS7 (and possibly others)
			if (!deviceIsIOS || targetTagName !== 'select') {
				this.targetElement = null;
				event.preventDefault();
			}

			return false;
		}

		if (deviceIsIOS && !deviceIsIOS4) {

			// Don't send a synthetic click event if the target element is contained within a parent layer that was scrolled
			// and this tap is being used to stop the scrolling (usually initiated by a fling - issue #42).
			scrollParent = targetElement.fastClickScrollParent;
			if (scrollParent && scrollParent.fastClickLastScrollTop !== scrollParent.scrollTop) {
				return true;
			}
		}

		// Prevent the actual click from going though - unless the target node is marked as requiring
		// real clicks or if it is in the whitelist in which case only non-programmatic clicks are permitted.
		if (!this.needsClick(targetElement)) {
			event.preventDefault();
			this.sendClick(targetElement, event);
		}

		return false;
	};


	/**
	 * On touch cancel, stop tracking the click.
	 *
	 * @returns {void}
	 */
	FastClick.prototype.onTouchCancel = function() {
		this.trackingClick = false;
		this.targetElement = null;
	};


	/**
	 * Determine mouse events which should be permitted.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onMouse = function(event) {

		// If a target element was never set (because a touch event was never fired) allow the event
		if (!this.targetElement) {
			return true;
		}

		if (event.forwardedTouchEvent) {
			return true;
		}

		// Programmatically generated events targeting a specific element should be permitted
		if (!event.cancelable) {
			return true;
		}

		// Derive and check the target element to see whether the mouse event needs to be permitted;
		// unless explicitly enabled, prevent non-touch click events from triggering actions,
		// to prevent ghost/doubleclicks.
		if (!this.needsClick(this.targetElement) || this.cancelNextClick) {

			// Prevent any user-added listeners declared on FastClick element from being fired.
			if (event.stopImmediatePropagation) {
				event.stopImmediatePropagation();
			} else {

				// Part of the hack for browsers that don't support Event#stopImmediatePropagation (e.g. Android 2)
				event.propagationStopped = true;
			}

			// Cancel the event
			event.stopPropagation();
			event.preventDefault();

			return false;
		}

		// If the mouse event is permitted, return true for the action to go through.
		return true;
	};


	/**
	 * On actual clicks, determine whether this is a touch-generated click, a click action occurring
	 * naturally after a delay after a touch (which needs to be cancelled to avoid duplication), or
	 * an actual click which should be permitted.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onClick = function(event) {
		var permitted;

		// It's possible for another FastClick-like library delivered with third-party code to fire a click event before FastClick does (issue #44). In that case, set the click-tracking flag back to false and return early. This will cause onTouchEnd to return early.
		if (this.trackingClick) {
			this.targetElement = null;
			this.trackingClick = false;
			return true;
		}

		// Very odd behaviour on iOS (issue #18): if a submit element is present inside a form and the user hits enter in the iOS simulator or clicks the Go button on the pop-up OS keyboard the a kind of 'fake' click event will be triggered with the submit-type input element as the target.
		if (event.target.type === 'submit' && event.detail === 0) {
			return true;
		}

		permitted = this.onMouse(event);

		// Only unset targetElement if the click is not permitted. This will ensure that the check for !targetElement in onMouse fails and the browser's click doesn't go through.
		if (!permitted) {
			this.targetElement = null;
		}

		// If clicks are permitted, return true for the action to go through.
		return permitted;
	};


	/**
	 * Remove all FastClick's event listeners.
	 *
	 * @returns {void}
	 */
	FastClick.prototype.destroy = function() {
		var layer = this.layer;

		if (deviceIsAndroid) {
			layer.removeEventListener('mouseover', this.onMouse, true);
			layer.removeEventListener('mousedown', this.onMouse, true);
			layer.removeEventListener('mouseup', this.onMouse, true);
		}

		layer.removeEventListener('click', this.onClick, true);
		layer.removeEventListener('touchstart', this.onTouchStart, false);
		layer.removeEventListener('touchmove', this.onTouchMove, false);
		layer.removeEventListener('touchend', this.onTouchEnd, false);
		layer.removeEventListener('touchcancel', this.onTouchCancel, false);
	};


	/**
	 * Check whether FastClick is needed.
	 *
	 * @param {Element} layer The layer to listen on
	 */
	FastClick.notNeeded = function(layer) {
		var metaViewport;
		var chromeVersion;
		var blackberryVersion;
		var firefoxVersion;

		// Devices that don't support touch don't need FastClick
		if (typeof window.ontouchstart === 'undefined') {
			return true;
		}

		// Chrome version - zero for other browsers
		chromeVersion = +(/Chrome\/([0-9]+)/.exec(navigator.userAgent) || [,0])[1];

		if (chromeVersion) {

			if (deviceIsAndroid) {
				metaViewport = document.querySelector('meta[name=viewport]');

				if (metaViewport) {
					// Chrome on Android with user-scalable="no" doesn't need FastClick (issue #89)
					if (metaViewport.content.indexOf('user-scalable=no') !== -1) {
						return true;
					}
					// Chrome 32 and above with width=device-width or less don't need FastClick
					if (chromeVersion > 31 && document.documentElement.scrollWidth <= window.outerWidth) {
						return true;
					}
				}

			// Chrome desktop doesn't need FastClick (issue #15)
			} else {
				return true;
			}
		}

		if (deviceIsBlackBerry10) {
			blackberryVersion = navigator.userAgent.match(/Version\/([0-9]*)\.([0-9]*)/);

			// BlackBerry 10.3+ does not require Fastclick library.
			// https://github.com/ftlabs/fastclick/issues/251
			if (blackberryVersion[1] >= 10 && blackberryVersion[2] >= 3) {
				metaViewport = document.querySelector('meta[name=viewport]');

				if (metaViewport) {
					// user-scalable=no eliminates click delay.
					if (metaViewport.content.indexOf('user-scalable=no') !== -1) {
						return true;
					}
					// width=device-width (or less than device-width) eliminates click delay.
					if (document.documentElement.scrollWidth <= window.outerWidth) {
						return true;
					}
				}
			}
		}

		// IE10 with -ms-touch-action: none or manipulation, which disables double-tap-to-zoom (issue #97)
		if (layer.style.msTouchAction === 'none' || layer.style.touchAction === 'manipulation') {
			return true;
		}

		// Firefox version - zero for other browsers
		firefoxVersion = +(/Firefox\/([0-9]+)/.exec(navigator.userAgent) || [,0])[1];

		if (firefoxVersion >= 27) {
			// Firefox 27+ does not have tap delay if the content is not zoomable - https://bugzilla.mozilla.org/show_bug.cgi?id=922896

			metaViewport = document.querySelector('meta[name=viewport]');
			if (metaViewport && (metaViewport.content.indexOf('user-scalable=no') !== -1 || document.documentElement.scrollWidth <= window.outerWidth)) {
				return true;
			}
		}

		// IE11: prefixed -ms-touch-action is no longer supported and it's recomended to use non-prefixed version
		// http://msdn.microsoft.com/en-us/library/windows/apps/Hh767313.aspx
		if (layer.style.touchAction === 'none' || layer.style.touchAction === 'manipulation') {
			return true;
		}

		return false;
	};


	/**
	 * Factory method for creating a FastClick object
	 *
	 * @param {Element} layer The layer to listen on
	 * @param {Object} [options={}] The options to override the defaults
	 */
	FastClick.attach = function(layer, options) {
		return new FastClick(layer, options);
	};


	if (typeof define === 'function' && typeof define.amd === 'object' && define.amd) {

		// AMD. Register as an anonymous module.
		define(function() {
			return FastClick;
		});
	} else if (typeof module !== 'undefined' && module.exports) {
		module.exports = FastClick.attach;
		module.exports.FastClick = FastClick;
	} else {
		window.FastClick = FastClick;
	}
}());

jQuery (document ).ready(function($){

/**
 * ----------------------------------------------------------------------------
 *
 *  Detect for IE and apply body class.
 *
 * ----------------------------------------------------------------------------
 */

function getInternetExplorerVersion()
{
  var rv = -1;
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  else if (navigator.appName == 'Netscape')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}


//If its IE, place "IE" and IE version number class on body tag
if(getInternetExplorerVersion() != "-1") {
	var bodyClass = "IE" + getInternetExplorerVersion();
	$("body").addClass("IE").addClass(bodyClass);
}


/**
 * ----------------------------------------------------------------------------
 *
 *  Apply fast click polyfill for mobile browsers
 *
 * ----------------------------------------------------------------------------
 */
 
FastClick.attach(document.body);


/**
 * ----------------------------------------------------------------------------
 *
 *  Button Pressed GUI Actions
 *
 * ----------------------------------------------------------------------------
 */
 
 $("a.button").mousedown(function() {
	$(this).addClass("pressed"); 
 });
 
  $("a.button").mouseup(function() {
	$(this).removeClass("pressed"); 
 });
 
 


/**
 * ----------------------------------------------------------------------------
 *
 *  Detect Browser and Mobile and apply it as a class to the body element
 *
 * ----------------------------------------------------------------------------
 */
 
var browser = BrowserDetect.browser;


$("body").addClass(browser);

var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
};

var mobileBrowser = isMobile.any();  //will return true of false

if( mobileBrowser ) {
    $('body').addClass("mobile");
}


/**
 * ----------------------------------------------------------------------------
 *
 *  Sticky header when scrolling up
 *
 * ----------------------------------------------------------------------------
 */
 
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   var header = $(".site-header").offset().top;
   var headerHeight = $(".site-header").height();
   var navHeight = $("#site-navigation").height();
   var navPos = $("#site-navigation").offset().top;
   var mobileOn = $(".site-header").hasClass("mobileOn");
   var brandingHeight = $(".site-branding").height();
   //brandingHeight = "-" + brandingHeight;
   var headerPlacement = st - headerHeight;
   
   if(mobileBrowser) {
	   $(".site-header").css("top","0px").css("position","fixed");
	   
	   if(st > headerHeight) {
		   $(".site-header").addClass("red");
	   } else {
		   $(".site-header").removeClass("red");
	   }
	   
   } else { 
   
	   if (st > lastScrollTop){
	       // downscroll code
	       
	       header = $(".site-header").offset().top;
	       $(".site-header").css("top",header).removeClass("sticky");
	       
	       
	       
	       if(st > (header+headerHeight)) {
	       	$(".site-header").css("top",headerPlacement);
	       	//console.log(headerPlacement);
	       }
	   } else {
	      // upscroll code
	      
	      if(!mobileOn) {
		      if(st <= navPos) {
			      $(".site-header").addClass("sticky").css("top","-"+brandingHeight+"px");
		      }
	      } else {
		      if(st <= header) {
			  		$(".site-header").addClass("sticky").css("top","0px");
	      		}
	      }
	      
	      
	   }
	   
	   if(st > headerHeight) {
		  
		   $(".site-header").addClass("red");
	   } else {
		   $(".site-header").removeClass("red");
	   }
	   
	   if(!mobileOn) {
		   if(st < brandingHeight) {
		   		$(".site-header").removeClass("red").removeClass("sticky").css("top","0px");
	   		}
		} else {
			if(st < 1) {
			$(".site-header").removeClass("red").removeClass("sticky").css("top","0px");
	   		}
		}
   
   }
   
    
   lastScrollTop = st;
});
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Hide Menus When clicking elsewhere
 *
 * ----------------------------------------------------------------------------
 */

$(window).click(function(e) {
	
	
	//close your uw menu
	$(".youruwmenu, .subLevel1, .subLevel2").removeClass("visible");
	
	$(".main-navigation ul li ul.children, .main-navigation ul li ul.sub-menu").hide();
	
});



/**
 * ----------------------------------------------------------------------------
 *
 *  Mobile Menu Logic
 *
 * ----------------------------------------------------------------------------
 */
 

 var menuWidth = $(".site-navigation-container .menu").width();
 var totalWidth = 0;
 $(".site-navigation-container .menu > ul > li, .site-navigation-container ul.menu > li").each(function() {
		totalWidth = totalWidth  + $(this).width();
		//console.log(totalWidth);
 });
 
  
 function mobileMenu() {
	  var windowWidth = $(window).width();
	  var menuWidth = $(".site-navigation-container .menu").width();
	  //console.log(menuWidth);
	   /*$(".menu > ul > li").each(function() {
			totalWidth = totalWidth  + $(this).width();
 		});*/
	 
	 //console.log(totalWidth + " " + menuWidth);

	 if(windowWidth < 600) {
		$("#site-navigation").css("visibility","hidden").css("height","0px");
		$(".mobileTrigger").addClass("shown");
		$(".logoImage").addClass("mobileMenuOn");
		$(".site-header").addClass("mobileOn");
		$("body").addClass("mobileNavOn");
	 } else {
	 
		 if(totalWidth > menuWidth) {
			 //console.log("switch to mobile");
			 $("#site-navigation").css("visibility","hidden").css("height","0px");
			 $(".mobileTrigger").addClass("shown");
			 $(".logoImage").addClass("mobileMenuOn");
			 $(".site-header").addClass("mobileOn");
			 $("body").addClass("mobileNavOn");
		 } else {
			 if(totalWidth == 0) {
				 //console.log("switch to mobile");
				 $("#site-navigation").css("visibility","hidden").css("height","0px");
				 $(".mobileTrigger").addClass("shown");
				 $(".logoImage").addClass("mobileMenuOn");
				 $(".site-header").addClass("mobileOn");
				 $("body").addClass("mobileNavOn");
			 } else {
				 //console.log("switch to full");
				 $("#site-navigation").css("visibility","visible").css("height","auto");
				 $(".mobileTrigger").removeClass("shown");
				 $(".logoImage").removeClass("mobileMenuOn");
				 $(".site-header").removeClass("mobileOn");
				 $("body").removeClass("mobileNavOn");
			 }
		 }
	 
	 }
}

mobileMenu();

$(window).resize(function() {
	mobileMenu();
});

$(".mobileTrigger, .menuOverlay").click(function(e) {
	e.preventDefault();
	
	$(".mobileMenu").toggleClass("mobileMenuShown");
	$(".menuOverlay").toggleClass("mobileMenuShown");
	$("#page").toggleClass("blur");
}); 


$(".mobileMenu li.page_item_has_children > a, .mobileMenu li.menu-item-has-children > a").click(function(e) {
	e.preventDefault();
	e.stopPropagation();
	
	var subItems = $(this).next().html();
	var clickedLinkTitle = $(this).text() + " Overview";
	var clickedLinkHref = $(this).attr("href");
	
	var overviewLink = "<li><a href='"+clickedLinkHref+"'>"+clickedLinkTitle+"</a></li>";
	var backLink = '<li class="subLevel1Back"><a href="#"><span><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></span> Back</a></li>';
	
	
	$(".mobileMenu .subLevel1").html(subItems).prepend(overviewLink).prepend(backLink).addClass("visible");
	
	$(".mobileMenu .subLevel1Back > a").click(function(b) {
		b.preventDefault();
		b.stopPropagation();
		
		$(".mobileMenu .subLevel1").removeClass("visible");
	});
	
	$(".mobileMenu .subLevel1 li.page_item_has_children > a, .mobileMenu .subLevel1 li.menu-item-has-children > a").click(function(c) {
		c.preventDefault();
		c.stopPropagation();
		
		var subItems = $(this).next().html();
		var clickedLinkTitle = $(this).text() + " Overview";
		var clickedLinkHref = $(this).attr("href");
		
		var overviewLink = "<li><a href='"+clickedLinkHref+"'>"+clickedLinkTitle+"</a></li>";
		var backLink = '<li class="subLevel2Back"><a href="#"><span><svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></span> Back</a></li>';
		
		
		$(".mobileMenu .subLevel2").html(subItems).prepend(overviewLink).prepend(backLink).addClass("visible");
		
		$(".subLevel2Back > a").click(function(b) {
			b.preventDefault();
			b.stopPropagation();
			
			$(".mobileMenu .subLevel2").removeClass("visible");
		});
		
	});
	
});


/**
 * ----------------------------------------------------------------------------
 *
 *  Sidebar menu logic additions
 *
 * ----------------------------------------------------------------------------
 */

$(".sidebar_menu.expanded .current_link").closest(".children").prev().addClass("immediateParent");




/**
 * ----------------------------------------------------------------------------
 *
 *  Setup Hero Image Carousel for Home Page
 *
 * ----------------------------------------------------------------------------
 */
 
	/*$(".owl-carousel").owlCarousel({
		items: 1,
		nav:true,
		loop: true,
		dots: true
	});*/
	
	$('.main-gallery').flickity({
	  // options
	  cellAlign: 'left',
	  contain: true,
	  wrapAround: true
	});
	



/**
 * ----------------------------------------------------------------------------
 *
 *  Setup Isotope for Tiles Homepage Layout
 *
 * ----------------------------------------------------------------------------
 */
 
 	


  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-sizer',
      gutter: '.gutter-sizer'
     
    }
  });
  
  $grid.imagesLoaded().progress( function() {
	  $grid.isotope('layout');
	});



/**
 * ----------------------------------------------------------------------------
 *
 *  3D Tiles logic
 *
 * ----------------------------------------------------------------------------
 */

 

  var lastScrollTop = 0;
  var lastScrollLeft = 0;
  var scrollTimeout;

  /*$(window).scroll(function() {

    var st = $(this).scrollTop();
    var sl = $(this).scrollLeft();

    if (sl > lastScrollLeft) {
      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }
        
        
        var tiltdepth = $(this).closest(".tiltWrapper").attr("data-tiltdepth");
    
	    if (!tiltdepth) {
			
	      //default to 10deg throw when no max angle is defined in attribute.
	      var tiltdepth = 70;
	    }

        var rotation = "transform: rotateY(-" + maxdeg + "deg); transform-origin: center center 80px; transition: 0.7s transform; -webkit-transform: rotateY(-" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });
    } else {
      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }

        var rotation = "transform: rotateY(" + maxdeg + "deg); transform-origin: center center 80px; transition: 0.7s transform; -webkit-transform: rotateY(" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });
    }

    if (st > lastScrollTop) {
      // downscroll code

      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }

        //console.log("scrolling down");
        var rotation = "transform: rotateX(" + maxdeg + "deg); transition: 0.7s transform; -webkit-transform: rotateX(" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });
    } else if (st < lastScrollTop) {
      // upscroll code
      clearTimeout(scrollTimeout);

      $(".tiltWrapper").each(function() {

        var rotateelem = $(this).find(".tiltPanel");

        var maxdeg = $(this).attr("data-maxangle");

        if (!maxdeg) {
          //default to 10deg throw when no max angle is defined in attribute.
          var maxdeg = 10;
        }

        var rotation = "transform: rotateX(-" + maxdeg + "deg); transition: 0.7s transform; -webkit-transform: rotateX(-" + maxdeg + "deg); -webkit-transition: 0.7s transform;";
        $(rotateelem).attr("style", rotation);
      });

    }

    lastScrollTop = st;

    clearTimeout($.data(this, 'scrollTimer'));
    $.data(this, 'scrollTimer', setTimeout(function() {

      $(".tiltWrapper").each(function() {
        var rotateelem = $(this).find(".tiltPanel");
        var rotation = "transform: rotateX(0deg) rotateY(0deg); transition: 0.8s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 0.8s transform;";
        $(rotateelem).attr("style", rotation);
      });
    }, 100));

  });*/

  $("a.tiltAction").mousedown(function(event) {
    var elem = $(this).closest(".tiltWrapper");
    $(elem).addClass("pressed");
  });

  $("a.tiltAction").mouseup(function(event) {
    var elem = $(this).closest(".tiltWrapper");
    $(elem).removeClass("pressed");
  });

  $("a.tiltAction").mouseout(function(event) {
    var reflectionelem = $(this).next().find(".reflection");
    $(reflectionelem).css("opacity", "0");
  });

  $("a.tiltAction").mousemove(function(event) {
    var wrapperelem = $(this).closest(".tiltWrapper");
    
    $(wrapperelem).css("z-index","10");
    
    var rotateelem = $(this).next(".tiltPanel");
    var reflectionelem = $(this).next().find(".reflection");

    
    var tiltdepth = $(this).closest(".tiltWrapper").attr("data-tiltdepth");
    
    if (!tiltdepth) {
		
      //default to 10deg throw when no max angle is defined in attribute.
      var tiltdepth = 70;
    }
    
    
    var maxdeg = $(this).closest(".tiltWrapper").attr("data-maxangle");

    if (!maxdeg) {

      //default to 10deg throw when no max angle is defined in attribute.
      var maxdeg = 10;
    }

    var elemoffset = $(this).offset();
    var elemwidth = $(this).width();
    var elemheight = $(this).height();

    var cursorX = event.pageX - elemoffset.left;
    var cursorY = event.pageY - elemoffset.top;

    if (cursorX < (elemwidth / 2)) {
      var perX = (cursorX / (elemwidth / 2)) - 1;
      var opacityX = 1 - (cursorX / (elemwidth / 2));
      var degX = Math.floor(maxdeg * perX);
      var refX = elemwidth - cursorX;

    } else {
      var perX = 1 - (cursorX / (elemwidth / 2));
      var opacityX = (cursorX / (elemwidth / 2)) - 1;
      var degX = Math.floor(-(maxdeg * perX));
      var refX = elemwidth - cursorX;
    }

    if (cursorY < (elemheight / 2)) {
      var perY = 1 - (cursorY / (elemheight / 2));
      var degY = Math.floor(maxdeg * perY);
      var refY = elemheight - cursorY;
    } else {
      var perY = (cursorY / (elemheight / 2)) - 1;
      var degY = Math.floor(-(maxdeg * perY));
      var refY = elemheight - cursorY;
    }

     var rotation = "transform: rotateX(" + degY + "deg) rotateY(" + degX + "deg); transform-origin: center center "+tiltdepth+"px; -webkit-transform: rotateX(" + degY + "deg) rotateY(" + degX + "deg); -webkit-transform-origin: center center "+tiltdepth+"px;"; 
    $(rotateelem).attr("style", rotation);

    var reflection = "transform: translate(" + refX + "px, " + refY + "px); -webkit-transform: translate(" + refX + "px, " + refY + "px); opacity: " + opacityX + ";";
    $(reflectionelem).attr("style", reflection);

  });

  $("a.tiltAction").mouseout(function() {
    var rotateelem = $(this).next(".tiltPanel");
    
    var wrapperelem = $(this).closest(".tiltWrapper");
    
    var tiltdepth = $(this).closest(".tiltWrapper").attr("data-tiltdepth");
    
    if (!tiltdepth) {
	   
      //default to 10deg throw when no max angle is defined in attribute.
      var tiltdepth = 70;
    }
    
    $(wrapperelem).css("z-index","");
	
		if(browser == "Firefox") {
			var rotation = "transform: rotateX(0deg) rotateY(0deg); transform-origin: center center "+tiltdepth+"px; transition: 0.0s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 0.0s transform; -webkit-transform-origin: center center "+tiltdepth+"px;";
		} else {
	
		var rotation = "transform: rotateX(0deg) rotateY(0deg); transform-origin: center center "+tiltdepth+"px; transition: 1.0s transform; -webkit-transform: rotateX(0deg) rotateY(0deg); -webkit-transition: 1.0s transform; -webkit-transform-origin: center center "+tiltdepth+"px;";
		}
    
    $(rotateelem).attr("style", rotation);
  });



	
/**
 * ----------------------------------------------------------------------------
 *
 *  Assign header menu controls
 *
 * ----------------------------------------------------------------------------
 */
 
	$(".youruwTrigger").click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		
		$(".youruwmenu").toggleClass("visible");
		
	});
	
	var searchVisible = false;
	
	$(".searchTrigger, .searchClose, .searchResultsOverlay").click(function(e) {
		e.preventDefault();
		
		if(searchVisible) {
			$("#ajaxResults").attr("style","").html("");
			$("input[name='s']").val("");
			$(".searchUI").toggleClass("visible").attr("aria-hidden","true");
			$("#page").toggleClass("blur");
			$(".searchResultsOverlay").toggleClass("visible").attr("aria-hidden","true");
			setTimeout(function() {
				$(".searchUI input.search-field").blur();
			},100);
			
			searchVisible = false;
		} else {
			
			$(".searchUI").toggleClass("visible").attr("aria-hidden","false");
			$("#page").toggleClass("blur");
			$(".searchResultsOverlay").toggleClass("visible").attr("aria-hidden","false");
			setTimeout(function() {
				$(".searchUI input.search-field").focus();
			},500);
			
			searchVisible = true;
		}
		
		
		
		
	});
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Search AJAX Logic
 *
 * ----------------------------------------------------------------------------
 */	
 	var searchUiHeight = $(".searchUI").height();
 	var remainingHeight = $(window).height();
 	var resultsMinHeight = remainingHeight - searchUiHeight;
 	var bodyHeight = $("body").height();

 	$(".searchUI form.search-form").submit(function(e) {
	 	e.preventDefault();
	 	
	 	var searchTerm = $(this).find("input[name='s']").val();
	 	var fixedSearchTerm = searchTerm.split(' ').join('+');
	 	var searchUrl = templateUrl + "/?s=" + fixedSearchTerm + " #main";
	 	
	 	$(".searchUI").addClass("searching");
		 	
	 	
	 	
	 	$( "#ajaxResults" ).load( searchUrl, function() {
		  //completed loading results
		  $("#ajaxResults").css("height",resultsMinHeight);
		  $(".searchUI").removeClass("searching");
		  
		  setTimeout(function() {
			  window.scrollTo(0, 0);
			  $("#ajaxResults").css("height","auto");
			  $(".searchUI").css("position","absolute");
		  },500);
		});
 	});
 	
 	$(window).resize(function() {
	 	searchUiHeight = $(".searchUI").height();
	 	remainingHeight = $(window).height();
 		resultsMinHeight = remainingHeight - searchUiHeight;
 	});
 
/**
 * ----------------------------------------------------------------------------
 *
 *  Default Page Height
 *
 * ----------------------------------------------------------------------------
 */
 	function setPageHeight(){
	 	var wH = $(window).height();
		var fH = $("footer").height();
		var hH = $("header").height();
	 
	 	$(".site-main").css("min-height",wH-(hH));
	 }
	 
	 //call once on pageload
	 setPageHeight();
	 
	 $( window ).resize(function() {
	 	setPageHeight();
	 });
	 
	 
	 
/**
 * ----------------------------------------------------------------------------
 *
 *  Spotlight image resizing
 *
 * ----------------------------------------------------------------------------
 */
	$('.box').each(function() {
	    //set size
	    var th = $(this).height(),//box height
	        tw = $(this).width(),//box width
	        im = $(this).children('img'),//image
	        ih = im.height(),//inital image height
	        iw = im.width();//initial image width
	    if (ih>iw) {//if portrait
		    
	        im.addClass('ww').removeClass('wh');//set width 100%
	    } else {//if landscape
		    
	        im.addClass('wh').removeClass('ww');//set height 100%
	    }
	    //set offset
	    var nh = im.height(),//new image height
	        nw = im.width(),//new image width
	        hd = (nh-th)/2,//half dif img/box height
	        wd = (nw-tw)/2;//half dif img/box width
	    if (nh<nw) {//if portrait
		    
	        im.css({marginLeft: '-'+wd+'px', marginTop: 0});//offset left
	    } else {//if landscape
		    
	        im.css({marginTop: '-'+hd+'px', marginLeft: 0});//offset top
	    }
	});
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Set the width of a page depending on if there is a side nav
 *
 * ----------------------------------------------------------------------------
 */	
	
	function setContentWidth(){
		//used on pages
		if ($(".sidebar_menu")[0]){
			$("#content").addClass("has_nav"); 
		} else {
			$("#content").removeClass("has_nav"); 
		}
		
		
		//used on posts
		if ($(".post-content .widget-area")[0]) {
			$(".content-area").addClass("span-66 right_margin"); 
		} else {
			$(".content-area").removeClass("span-66 right_margin"); 
		}
		
		
	}
	   
	setContentWidth();
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  wrap widget-area for styles
 *
 * ----------------------------------------------------------------------------
 */	
 	$( ".widget-area ul li a" ).each(function( index ) {
		$(this).wrapInner( "<span class='nav_text'></span>");
	});
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  blur scroll effect for homepage
 *
 * ----------------------------------------------------------------------------
 */
 
 	if($("body").hasClass("home")) {
	 	if($("#page").hasClass("visibleSlides")) {
		 	$(window).scroll(function() {
			 	var galleryHeight = $(".main-gallery").height();
			 	var scrollTop = $(window).scrollTop();
			 	var galleryCutOff = galleryHeight * .4;
			 	
			 	if((scrollTop > (galleryHeight - galleryCutOff)) && (scrollTop < (galleryHeight +galleryCutOff))) {
				 	
				 	var percentageBlur = (scrollTop/(galleryHeight-galleryCutOff)-1);
				 	var blurValue = percentageBlur * 15;
				 	var blurStr = "filter: blur("+blurValue+"px); -webkit-filter: blur("+blurValue+"px)";
				 	
				 	$(".featureHeader").attr("style",blurStr); 
			 	} else {
				 	var blurStr = "filter: blur(0px); -webkit-filter: blur(0px)";
				 	$(".featureHeader").attr("style",blurStr); 
			 	}
		 	});
		 	
	 	}
 	}
 	
 	
 	
 	if($("body").hasClass("page")) {
	 	if($("#primary").hasClass("heroImage")) {
		 	$(window).scroll(function() {
			 	var galleryHeight = $(".heroWatermark").height();
			 	var scrollTop = $(window).scrollTop();
			 	var galleryCutOff = galleryHeight * .4;
			 	
			 	if((scrollTop < galleryHeight)) {
				 	
				 	var percentageBlur = ((galleryHeight/scrollTop)-1);
				 	var blurValue = percentageBlur;
				 	var blurStr = "opacity: "+blurValue+"; -webkit-opacity: "+blurValue+"; ";
				 	
				 	$(".heroWatermark").attr("style",blurStr); 
			 	} else {
				 	var blurStr = "opacity: 0; -webkit-opacity: 0;";
				 	$(".heroWatermark").attr("style",blurStr); 
			 	}
		 	});
		 	
	 	}
 	}
 	
 	
/**
 * ----------------------------------------------------------------------------
 *
 *  Drop Down Menu Click Events
 *
 * ----------------------------------------------------------------------------
 */
 
 	 $(".dropdownEnabled ul > li a").each(function() {
	 	 
	 	 var elem = $(this);
	 	 var href = $(this).attr("href");
	 	 var text = $(this).text();
	 	 text = text + " Overview";
	 	 var menuitem = $(this).next();
	 	 
	 	 var item = "<li><a href='"+href+"'>"+text+"</a><li>";
	 	 var arrow = '<span class="arrow"><svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path class="lines" d="M14.83 16.42l9.17 9.17 9.17-9.17 2.83 2.83-12 12-12-12z"/><path d="M0-.75h48v48h-48z" fill="none"/></svg></span>';
	 	 
	 	 if($(menuitem).hasClass("children") || $(menuitem).hasClass("sub-menu")) {
		 	 $(menuitem).prepend(item);
		 	 $(elem).addClass("arrowOn").append(arrow);
		 	 
	 	 }
	 	 
	 	 
	 	 
	 	 
 	 });
 	 
 	 $(".dropdownEnabled .sub-menu a.arrowOn .arrow, .dropdownEnabled .children a.arrowOn .arrow").hide();
 
	 $(".dropdownEnabled ul li a").click(function(e) {
		 
		 var elem = $(this);
		 
		 
		 
		 if( $(elem).closest('ul').hasClass("sub-menu") || $(elem).closest('ul').hasClass("children") ) {
		 	
		 } else {
			 
			 if($(elem).closest("li").hasClass("page_item_has_children") || $(elem).closest("li").hasClass("menu-item-has-children")) {
				
				 e.preventDefault();
				 e.stopPropagation();
				 
				 
				 $(".dropdownEnabled ul.children, .dropdownEnabled ul.sub-menu").hide();
				 
				 $(this).next(".children").show();
				 $(this).next(".sub-menu").show();
			
			} else { 
				//follow link normally
			}
		 
		 }
		 
		 
	 });
	 
	 
 
 	
 
});




