<main>
    <section class="side-menu side-menu-hidden-brut" id="side-menu">
        <section class="side-menu-el side-menu-user">
            <header>
                <ul class="user">
                    <li><img id="avatar" src="/assets/images/default-avatar.png" alt=""></li>
                    <li><p>Bonjour <span id="firstname" class="strong"></span> <span id="lastname"
                                                                                     class="strong"></span></p></li>
                    <li>
                        <ul class="user-setting">
                            <li>
                                <button id="preference">Preferences</button>
                            </li>
                            <li>
                                <button id="logout">Déconnexion</button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </header>
            <ul>
                <li>
                    <a href="#/maison">Ma maison</a>
                </li>
                <li>
                    <a href="#/">Acceuil</a>
                </li>
                <li>
                    <a href="docs">Documentation</a>
                </li>
            </ul>
        </section>
        <section class="side-menu-el side-menu-devices">
            <header>
                <h2>Vos capteurs</h2>
            </header>
            <ul>
                <li>
                    <span>ON</span>
                    <p>Capt 1</p>
                </li>
                <li>
                    <span>OFF</span>
                    <p>Capt 2</p>
                </li>
            </ul>
        </section>
    </section>
    <section class="content" id="content">
        <div id="content-embeded">
            <div id="loader" class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </section>
    <section class="preference_menu" id="preference_menu">
        <header>
            <h3>Preferences</h3>
        </header>
        <section class="bgcolor">
            <header>
                <h4>Couleur de l'interface</h4>
            </header>
            <ul id="bgcolor_list"></ul>
        </section>
    </section>
</main>

