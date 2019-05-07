@extends("templates.sign.master")

@section("title","Area registrazione Agroambiente")

@section("content")
      <div class="card-body">

         <h2 class="title">Registrati</h2>

                    <hr />

                    <br/>

                    <h3>Azienda</h3>

                    <br/>

                    <h4>Dati Registrante</h4>

                    <br/>

                    <form method="POST" action="/register">
                        @csrf
                        @include('components/errors')
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Nome</label>
                                    <input class="input--style-4 @if($errors->has('nome')) errors-label @endif" type="text" name="nome" value="{{ old('nome') }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Cognome</label>
                                    <input class="input--style-4 @if($errors->has('cognome')) errors-label @endif" type="text" name="cognome" value="{{ old('cognome') }}">
                                </div>
                            </div>
                        </div>
                           <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">E-mail</label>
                                    <input class="input--style-4 @if($errors->has('email')) errors-label @endif" type="email" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Numero di Telefono</label>
                                    <input class="input--style-4 @if($errors->has('phone')) errors-label @endif" type="text" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>

                        <hr />

                        <br/>

                        <h4>Dati Ragione Sociale</h4>

                    <br/>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Numero Partita Iva</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4  @if($errors->has('piva')) errors-label @endif" type="text" name="piva" value="{{ old('piva') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Codice Fiscale</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4  @if($errors->has('codfiscale')) errors-label @endif" type="text" name="codfiscale" value="{{ old('codfiscale') }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Ragione Sociale</label>
                                    <input class="input--style-4 @if($errors->has('ragsoc')) errors-label @endif" type="text" name="ragsoc" value="{{ old('ragsoc') }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Paese</label>

                                   <input class="input--style-4 @if($errors->has('paese')) errors-label @endif" type="text" name="paese" value="{{ old('paese') }}" list="paese_list" />
                                    <datalist id="paese_list">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <!-- etc -->
                                    </datalist>
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Password</label>
                                    <input class="input--style-4 @if($errors->has('password')) errors-label @endif" type="password" name="password">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Conferma la password</label>
                                    <input class="input--style-4 @if($errors->has('password_confirmation')) password_confirmation @endif" type="password" name="password_confirmation">
                                </div>
                            </div>
                        </div>



                        <div class="gdpr-terms-section">
    <div class="gdpr-terms-info form-check form-check-inline">
        <div class="w-100 gdpr-terms-title">
            <b>Termini e Condizioni Generali</b>    </div>
        <div class="w-100 gdpr-terms-main-text">
            Agroambiente.srl si impegna a trattare i dati personali in modo confidenziale e responsabile, garantendo che tutto avverrà nel rigoroso rispetto del RGPD.          <br>&nbsp;<br>
            Contrassegnando l'opzione qui di seguito, dichiaro di essere a conoscenza e di accettare i Termini e Condizioni Generali dello store online e la Politica sulla Privacy e Protezione Dati adottata  per poter navigare nel sito.        </div>
        <div class="w-100 col-12 @if($errors->has('accept_terms')) errors-label @endif">
                <input style="width:15px;" class="form-check-input pull-left @if($errors->has('accept_terms')) checked @endif" type="checkbox" name="accept_terms" id="terms_and_conditions" value="1">

                    <label style="width: 90%; margin-left: 10px;" class="form-check-label px-0 pull-left" for="terms_and_conditions">
                Dichiaro di essere stato informato riguardo i Termini e Condizioni Generali del sito <a href="http://www.agroambientesrl.it">www.agroambientesrl.com</a> ed acconsento alla creazione del mio account secondo i termini indicati.               <span class="gdpr-terms-ast">*</span>
            </label>
            <p style="clear:both;"></p>
        </div>
                <div class="w-100 gdpr-note">
            <b>IMPORTANTE: Puoi modificare o revocare il tuo consenso in qualunque momento.</b>     </div>  
    </div>
</div>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Crea Account</button>
                        </div>
                    </form>
                </div>
@endsection