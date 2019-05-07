<?php $__env->startSection("title","Area registrazione Agroambiente"); ?>

<?php $__env->startSection("content"); ?>
	  <div class="card-body">

         <h2 class="title">Registrati</h2>

                    <hr />

                    <br/>

                    <h3>Privato</h3>

                    <br/>

                    <form method="POST" action="/register">
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('components/errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Nome</label>
                                    <input class="input--style-4 <?php if($errors->has('nome')): ?> errors-label <?php endif; ?>" type="text" name="nome" value="<?php echo e(old('nome')); ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Cognome</label>
                                    <input class="input--style-4 <?php if($errors->has('cognome')): ?> errors-label <?php endif; ?>" type="text" name="cognome" value="<?php echo e(old('cognome')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Data di nascita</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker <?php if($errors->has('compleanno')): ?> errors-label <?php endif; ?>" type="text" name="compleanno" value="<?php echo e(old('compleanno')); ?>">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Sesso</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Uomo
                                            <input type="radio" checked="checked" name="sesso" value="uomo"  <?php if(is_array(old('sesso')) && in_array("uomo",old('sesso'))): ?> checked <?php endif; ?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Donna
                                            <input type="radio" name="sesso">
                                            <span class="checkmark" value="donna" <?php if(is_array(old('sesso')) && in_array("donna",old('sesso'))): ?> checked <?php endif; ?>></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">E-mail</label>
                                    <input class="input--style-4 <?php if($errors->has('email')): ?> errors-label <?php endif; ?>" type="email" name="email" value="<?php echo e(old('email')); ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Numero di Telefono</label>
                                    <input class="input--style-4 <?php if($errors->has('phone')): ?> errors-label <?php endif; ?>" type="text" name="phone" value="<?php echo e(old('phone')); ?>">
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Password</label>
                                    <input class="input--style-4 <?php if($errors->has('password')): ?> errors-label <?php endif; ?>" type="password" name="password">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label required">Conferma la password</label>
                                    <input class="input--style-4 <?php if($errors->has('password_confirmation')): ?> password_confirmation <?php endif; ?>" type="password" name="password_confirmation">
                                </div>
                            </div>
                        </div>

    <div class="w-100 col-12 ">
                <input style="width:15px;" class="form-check-input pull-left " type="checkbox" name="azienda" id="aziendacheck" value="1">

                    <label style="width: 90%; margin-left: 10px; margin-bottom:10px;" class="form-check-label px-0 pull-left" for="aziendacheck">
                        registrati come azienda
                    </label>
            <p style="clear:both;"></p>
    </div>


        <?php if( request()->get('azienda') ): ?>
            <p>questa è una azienda</p>
        <?php endif; ?>


        <div class="azienda" style="display:none;">

            <p>questo è azienda</p>

        </div>

                        <div class="gdpr-terms-section">
	<div class="gdpr-terms-info form-check form-check-inline">
		<div class="w-100 gdpr-terms-title">
			<b>Termini e Condizioni Generali</b>	</div>
		<div class="w-100 gdpr-terms-main-text">
			Agroambiente.srl si impegna a trattare i dati personali in modo confidenziale e responsabile, garantendo che tutto avverrà nel rigoroso rispetto del RGPD.			<br>&nbsp;<br>
			Contrassegnando l'opzione qui di seguito, dichiaro di essere a conoscenza e di accettare i Termini e Condizioni Generali dello store online e la Politica sulla Privacy e Protezione Dati adottata  per poter navigare nel sito.		</div>
		<div class="w-100 col-12 <?php if($errors->has('accept_terms')): ?> errors-label <?php endif; ?>">
				<input style="width:15px;" class="form-check-input pull-left <?php if($errors->has('accept_terms')): ?> checked <?php endif; ?>" type="checkbox" name="accept_terms" id="terms_and_conditions" value="1">

					<label style="width: 90%; margin-left: 10px;" class="form-check-label px-0 pull-left" for="terms_and_conditions">
				Dichiaro di essere stato informato riguardo i Termini e Condizioni Generali del sito <a href="http://www.agroambientesrl.it">www.agroambientesrl.com</a> ed acconsento alla creazione del mio account secondo i termini indicati.				<span class="gdpr-terms-ast">*</span>
			</label>
			<p style="clear:both;"></p>
		</div>
				<div class="w-100 gdpr-note">
			<b>IMPORTANTE: Puoi modificare o revocare il tuo consenso in qualunque momento.</b>		</div>  
	</div>
</div>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Crea Account</button>
                        </div>
                    </form>
                </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.sign.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>