<nav class="navbar is-warning has-shadow top_navbar">
    <div class="container">
        <div class="navbar-brand">
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a class="navbar-item is-active" href="#"> {{ $sidebar->tz }} : {{ $sidebar->time }} </a>
            </div>

            <div class="navbar-end">
                <div class="field is-horizontal navbar-item">
                    <div class="field-label is-small ml-10 mr-5">
                        <label class="label">Currency</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                          <div class="control">
                            <div class="select is-primary is-small">
                              <select>
                                <option>USD</option>
                                <option>BDT</option>
                              </select>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="field-label is-small ml-10 mr-5">
                        <label class="label">Language</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                          <div class="control">
                            <div class="select is-primary is-small">
                              <select>
                                <option>English</option>
                                <option>Bangla</option>
                              </select>
                            </div>
                          </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</nav>