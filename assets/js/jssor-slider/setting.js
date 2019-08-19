jQuery(document).ready(function($) {
    if ( $( ".slider2_container" ).length ) {
        function a() {
            var s = i.$Elmt.parentNode.clientWidth,
                o = $(window).width();
            if (s) {
                var n = s;
                n = Math.min(n, o), i.$ScaleWidth(n)
            } else window.setTimeout(a, 30)
        }
        var s = [];
        s["CLIP|LR"] = {
            $Duration: 900,
            $Clip: 3,
            $Easing: $JssorEasing$.$EaseInOutCubic
        }, s["CLIP|TB"] = {
            $Duration: 900,
            $Clip: 12,
            $Easing: $JssorEasing$.$EaseInOutCubic
        }, s["ZMF|10"] = {
            $Duration: 600,
            $Zoom: 11,
            $Easing: {
                $Zoom: $JssorEasing$.$EaseInExpo,
                $Opacity: $JssorEasing$.$EaseLinear
            },
            $Opacity: 2
        }, s["ZML|R"] = {
            $Duration: 600,
            x: -.6,
            $Zoom: 11,
            $Easing: {
                $Left: $JssorEasing$.$EaseInCubic,
                $Zoom: $JssorEasing$.$EaseInCubic
            },
            $Opacity: 2
        }, s["ZML|B"] = {
            $Duration: 600,
            y: -.6,
            $Zoom: 11,
            $Easing: {
                $Top: $JssorEasing$.$EaseInCubic,
                $Zoom: $JssorEasing$.$EaseInCubic
            },
            $Opacity: 2
        }, s["ZMS|B"] = {
            $Duration: 700,
            y: -.6,
            $Zoom: 1,
            $Easing: {
                $Top: $JssorEasing$.$EaseInCubic,
                $Zoom: $JssorEasing$.$EaseInCubic
            },
            $Opacity: 2
        }, s["RTT|10"] = {
            $Duration: 700,
            $Zoom: 11,
            $Rotate: 1,
            $Easing: {
                $Zoom: $JssorEasing$.$EaseInExpo,
                $Opacity: $JssorEasing$.$EaseLinear,
                $Rotate: $JssorEasing$.$EaseInExpo
            },
            $Opacity: 2,
            $Round: {
                $Rotate: .8
            }
        }, s["RTTL|R"] = {
            $Duration: 700,
            x: -.6,
            $Zoom: 11,
            $Rotate: 1,
            $Easing: {
                $Left: $JssorEasing$.$EaseInCubic,
                $Zoom: $JssorEasing$.$EaseInCubic,
                $Opacity: $JssorEasing$.$EaseLinear,
                $Rotate: $JssorEasing$.$EaseInCubic
            },
            $Opacity: 2,
            $Round: {
                $Rotate: .8
            }
        }, s["RTTL|B"] = {
            $Duration: 700,
            y: -.6,
            $Zoom: 11,
            $Rotate: 1,
            $Easing: {
                $Top: $JssorEasing$.$EaseInCubic,
                $Zoom: $JssorEasing$.$EaseInCubic,
                $Opacity: $JssorEasing$.$EaseLinear,
                $Rotate: $JssorEasing$.$EaseInCubic
            },
            $Opacity: 2,
            $Round: {
                $Rotate: .8
            }
        }, s["RTTS|R"] = {
            $Duration: 700,
            x: -.6,
            $Zoom: 1,
            $Rotate: 1,
            $Easing: {
                $Left: $JssorEasing$.$EaseInQuad,
                $Zoom: $JssorEasing$.$EaseInQuad,
                $Rotate: $JssorEasing$.$EaseInQuad,
                $Opacity: $JssorEasing$.$EaseOutQuad
            },
            $Opacity: 2,
            $Round: {
                $Rotate: 1.2
            }
        }, s["RTTS|B"] = {
            $Duration: 700,
            y: -.6,
            $Zoom: 1,
            $Rotate: 1,
            $Easing: {
                $Top: $JssorEasing$.$EaseInQuad,
                $Zoom: $JssorEasing$.$EaseInQuad,
                $Rotate: $JssorEasing$.$EaseInQuad,
                $Opacity: $JssorEasing$.$EaseOutQuad
            },
            $Opacity: 2,
            $Round: {
                $Rotate: 1.2
            }
        }, s["R|IB"] = {
            $Duration: 900,
            x: -.6,
            $Easing: {
                $Left: $JssorEasing$.$EaseInOutBack
            },
            $Opacity: 2
        }, s["B|IB"] = {
            $Duration: 900,
            y: -.6,
            $Easing: {
                $Top: $JssorEasing$.$EaseInOutBack
            },
            $Opacity: 2
        }, s["FLTTR|R"] = {
            $Duration: 600,
            x: -.2,
            y: -.1,
            $Easing: {
                $Left: $JssorEasing$.$EaseLinear,
                $Top: $JssorEasing$.$EaseInWave
            },
            $Opacity: 2,
            $Round: {
                $Top: 1.3
            }
        }, s["CLIP|L"] = {
            $Duration: 600,
            $Clip: 1,
            $Easing: $JssorEasing$.$EaseInOutCubic
        }, s["RTT|10"] = {
            $Duration: 600,
            $Zoom: 11,
            $Rotate: 1,
            $Easing: {
                $Zoom: $JssorEasing$.$EaseInExpo,
                $Opacity: $JssorEasing$.$EaseLinear,
                $Rotate: $JssorEasing$.$EaseInExpo
            },
            $Opacity: 2,
            $Round: {
                $Rotate: .8
            }
        }, s["ZMF|10"] = {
            $Duration: 600,
            $Zoom: 11,
            $Easing: {
                $Zoom: $JssorEasing$.$EaseInExpo,
                $Opacity: $JssorEasing$.$EaseLinear
            },
            $Opacity: 2
        }, s["FLTTR|R"] = {
            $Duration: 600,
            x: -.2,
            y: -.1,
            $Easing: {
                $Left: $JssorEasing$.$EaseLinear,
                $Top: $JssorEasing$.$EaseInWave
            },
            $Opacity: 2,
            $Round: {
                $Top: 1.3
            }
        };
        var o = {
                $AutoPlay: !0,
                $DragOrientation: 3,
                $CaptionSliderOptions: {
                    $Class: $JssorCaptionSlider$,
                    $CaptionTransitions: s,
                    $PlayInMode: 1,
                    $PlayOutMode: 3
                }
            },
            i = new $JssorSlider$("slider2_container", o);
        a(), $(window).bind("load", a), $(window).bind("resize", a), $(window).bind("orientationchange", a)
    }
});