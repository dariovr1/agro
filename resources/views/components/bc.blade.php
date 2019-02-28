<div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  </li>
                  @if (isset($elem))
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ $elem }}</a></li>
                  </li>
                  @endif
                </ol>
              </nav>
            </div>