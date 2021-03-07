<div class="modal-backdrop fade-out display-none" id="navMore" aria-hidden="true">
    <div class="modal">
        <div class="modal-header">
            <h5>More at DutchtownSTL.org</h5>
            <button class="modal-close" data-target="navMore">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="modal-body">
            <div class="column">
                <h6><a href="/resources/">Resources</a></h6>
                <p>Check out our extensive list of <a href="/resources/">neighborhood resources</a> along with our guides:</p>
                <ul>
                    <li><a href="/resources/citizens-service-bureau/">Citizens' Service Bureau</a></li>
                    <li><a href="/resources/neighborhood-improvement-specialist/">Neighborhood Improvement Specialists</a></li>
                    <li><a href="/resources/police/">Police: Who, Where, and When to Call</a></li>
                    <li><a href="/resources/elected-officials/">Elected Officials in Dutchtown</a></li>
                </ul>
            </div>

            <div class="column">
                <h6><a href="/places/">Places Directory</a></h6>
                <p>Visit our <a href="/places/">directory of places in Dutchtown</a> including restaurants, bars, shops, services, and more!</p>

                <h6><a href="/godutch/">Go Dutch!</a></h6>
                <p>Find information geared towards real estate professionals about <a href="/godutch/">buying and selling in Dutchtown</a>.</p>
            </div>
            
            <div class="column">
                <h6><a href="/amp/">Allies of Marquette Park</a></h6>
                <p>Help <a href="/amp/">AMP</a> reactivate Marquette Park!</p>

                <h6><a href="/dwna/">Dutchtown West Neighborhood Association</a></h6>
                <p>Find out about <a href="/dwna/">DWNA</a>, a neighborhood group catering to those west of Grand.</p>
            </div>
        </div>

        <div class="modal-footer">
            <button class="modal-close" data-target="navMore">
                Close <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<div class="modal-backdrop fade-out display-none" id="navSearch" aria-hidden="true">
    <div class="modal">
        <div class="modal-header">
            <h5>Search DutchtownSTL.org</h5>
            <button class="modal-close" data-target="navSearch">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="modal-body">
            <form id="searchform" role="search" action="/" method="get">
                <input id="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'rdm' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" aria-labelled-by="searchModalLabel">
                <button type="submit" class="btn btn-bold btn-primary">Search</button>
            </form>
        </div>
    </div>
</div>

<div class="modal-backdrop fade-out display-none" id="navTranslate" aria-hidden="true">
    <div class="modal">
        <div class="modal-header">
            <h5>Translate DutchtownSTL.org</h5>
            <button class="modal-close" data-target="navTranslate">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="modal-body">
            <ul>
                <li>
                    <a href="https://feb2021.dutchtownstl.local" onclick="doGTranslate('en|en');return false;" title="English" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/en-us.png" height="24" width="24" alt="English" /> <span>English <span class="notranslate">English</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/es/" onclick="doGTranslate('en|es');return false;" title="Español" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/es-mx.png" height="24" width="24" alt="Español" /> <span>Español <span class="notranslate">Spanish</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/vi/" onclick="doGTranslate('en|vi');return false;" title="Tiếng Việt" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/vi.png" height="24" width="24" alt="Tiếng Việt" /> <span>Tiếng Việt <span class="notranslate">Vietnamese</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/ar/" onclick="doGTranslate('en|ar');return false;" title="العربية" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/ar.png" height="24" width="24" alt="العربية" /> <span>العربية <span class="notranslate">Arabic</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/bn/" onclick="doGTranslate('en|bn');return false;" title="বাংলা" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/bn.png" height="24" width="24" alt="বাংলা" /> <span>বাংলা <span class="notranslate">Bengali</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/bs/" onclick="doGTranslate('en|bs');return false;" title="Bosanski" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/bs.png" height="24" width="24" alt="Bosanski" /> <span>Bosanski <span class="notranslate">Bosnian</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/zh-CN/" onclick="doGTranslate('en|zh-CN');return false;" title="简体中文" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/zh-CN.png" height="24" width="24" alt="简体中文" /> <span>简体中文 <span class="notranslate">Chinese</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/fr/" onclick="doGTranslate('en|fr');return false;" title="Français" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/fr.png" height="24" width="24" alt="Français" /> <span>Français <span class="notranslate">French</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/my/" onclick="doGTranslate('en|my');return false;" title="ဗမာစာ" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/my.png" height="24" width="24" alt="ဗမာစာ" /> <span>ဗမာစာ <span class="notranslate">Burmese</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/ne/" onclick="doGTranslate('en|ne');return false;" title="नेपाली" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/ne.png" height="24" width="24" alt="नेपाली" /> <span>नेपाली <span class="notranslate">Nepali</span></span></a>
                </li>
                <li>
                    <a href="https://feb2021.dutchtownstl.local/so/" onclick="doGTranslate('en|so');return false;" title="Afsoomaali" class="glink nturl"><img src="//feb2021.dutchtownstl.local/wp-content/plugins/gtranslate/flags/24/so.png" height="24" width="24" alt="Afsoomaali" /> <span>Afsoomaali <span class="notranslate">Somali</span></span></a>
                </li>
            </ul>

            <script>
            function doGTranslate(lang_pair) {if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(typeof _gaq!='undefined'){_gaq.push(['_trackEvent', 'GTranslate', lang, location.pathname+location.search]);}else {if(typeof ga!='undefined')ga('send', 'event', 'GTranslate', lang, location.pathname+location.search);}var plang=location.pathname.split('/')[1];if(plang.length !=2 && plang != 'zh-CN' && plang != 'zh-TW' && plang != 'hmn' && plang != 'haw' && plang != 'ceb')plang='en';if(lang == 'en')location.href=location.protocol+'//'+location.host+gt_request_uri;else location.href=location.protocol+'//'+location.host+'/'+lang+gt_request_uri;}
            </script>
        </div>

        <div class="modal-footer">
            <button class="modal-close" data-target="navTranslate">
                Close <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>