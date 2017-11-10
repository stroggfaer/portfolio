<?php
namespace app\components\html;
use yii\base\Widget;

class WCounters extends Widget{

    public function run(){
        ?>
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            window.dataLayer = window.dataLayer || [];
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter35020820 = new Ya.Metrika({
                            id:35020820,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true,
                            webvisor:true,
                            ecommerce:"dataLayer"
                        });
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");





        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/35020820" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

        <?php
    }
}