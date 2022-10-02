@extends('layouts.web')

@section('content')
<div class="section-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-container-spacer text-center">
                    <h1 class="h2">Bienvenido al Club</h1>
                    <tr>
                        <td>
                            <h3>Por favor ingresa tus datos para continuar con la compra</h3>
                        </td>
                    </tr>

                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form onsubmit="prepare(event)" class="reveal-content">
                            <input type="hidden" id="hash" name="hash" value="{{ request()->hash }}">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Celular">
                                    </div>

                                    <button type="submit" class="btn btn-default btn-lg">Finalizar compra</button>
                                </div>
                                <div class="col-md-5 address-container">
                                    <ul class="list-unstyled">
                                        <tr>
                                            <td>
                                                <h3>Finaliza Tu Compra</h3>
                                            </td>
                                        </tr>
                                        <li>
                                            <tr>
                                                <td>
                                                    <h4>Ingresa tus datos y da click en el botón finalizar compra</h4>
                                                </td>
                                            </tr>
                                        </li>
                                        <li>
                                            <tr>
                                                <td>
                                                    <h4>Realiza tu pago con PayPhone, la mejor forma de pagar en Ecuador y el mundo </h4>
                                                </td>
                                            </tr>

                                        </li>
                                        <li>
                                            <tr>
                                                <td>
                                                    <h4>Una vez realizado el pago recibirás a tu correo un código QR el cual contiene tu NFT </h4>
                                                </td>
                                            </tr>
                                        </li>
                                    </ul>
                                    <h3>Siguenos</h3>
                                    <a href="http://www.facebook.com" title="" class="fa-icon">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a href="http://www.twitter.com" title="" class="fa-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>


                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<footer class="footer-container text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>ETERNUM CLUB © | IS A <a style="text-decoration:none;" href="https://simetricsoftware.com/">SIMETRIC SOFTWARE PRODUCTION</a></p>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        navActivePage();
    });

    function prepare(e) {
        e.preventDefault()

        const hash = document.getElementById('hash').value
        const name = document.getElementById('name').value
        const email = document.getElementById('email').value
        const phone = document.getElementById('phone').value

        const body = JSON.stringify({
            amount: 100,
            amountWithoutTax: 100,
            clientTransactionID: new Date().getTime(),
            responseUrl: `https://localhost/request-qr?hash=${hash}&name=${name}&email=${email}&phone=${phone}`,
            cancellationUrl: "https://localhost/request-qr",
        })

        fetch('https://pay.payphonetodoesposible.com/api/Links', {
        /* fetch('https://pay.payphonetodoesposible.com/api/button/Prepare', { */
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                /* 'Content-Type': 'application/x-www-form-urlencoded', */
                'Authorization': "Bearer qHFtKLJQ53DNmdpp8LygueJJsu8cdGVA3bnpcgfkDy1cBvLzbe7S89aOmRJrzIy4isLJhdoxSJfhqHIKD3AeQyaFH2i-Y1lOFPbZBiORV-1vAhtCrIWMqKmGDEiKcoErB4l6N-DSTwhnjt_gKDOdUWYVeHv9fO3JG5BAUBwQCsKgP6wmKYeV0i8ExHs_R-8-04ViNDSjdRcAWSk-xD9vRACX0WFCZitFvss-fxxADNgTkpOt87qcjw2s6fTC7lG23hq2XD3dqWXepn_kvk-z6PlVk8du3VHVdlFm9euTyJRL3r_lGDlNPAZj72Ozzlx8ChgLKA"
            },
            body
        })
    }
</script>
@endsection
