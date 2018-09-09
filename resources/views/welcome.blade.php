<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <div class="container">
        <div class="row">
            
            {{-- Titre --}}
            <div class="col-lg-12"><center><h1>Cryptography algorithms</h1></center><br><br></div>
           
            {{-- Barre de menus--}}
            <div class="col-lg-12 buttons-box" >
                <div class="col-lg-2" id="vigbtn"><p><i class="fa fa-arrow-up" aria-hidden="true"></i> &nbsp;&nbsp; vigènere  &nbsp;&nbsp;<i class="fa fa-arrow-down" aria-hidden="true"></i></p></div>
                <div class="col-lg-2" id="cesbtn"><p><i class="fa fa-arrow-up" aria-hidden="true"></i> &nbsp;&nbsp; césar &nbsp;&nbsp;<i class="fa fa-arrow-down" aria-hidden="true"></i></p></div>
                <div class="col-lg-2" id="affbtn"><p><i class="fa fa-arrow-up" aria-hidden="true"></i> &nbsp;&nbsp; affine &nbsp;&nbsp;</p></div>
                <div class="col-lg-2" id="transbtn"><p><i class="fa fa-smile-o" aria-hidden="true"></i> <i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;&nbsp;transposé &nbsp;&nbsp;<i class="fa fa-smile-o" aria-hidden="true"></i><i class="fa fa-smile-o" aria-hidden="true"></i></p></div>
                <div class="col-lg-2" id="monobtn"><p><i class="fa fa-arrow-up" aria-hidden="true"></i>&nbsp;&nbsp; mono-alpha &nbsp;&nbsp;<i class="fa fa-arrow-down" aria-hidden="true"></i></p></div>
                <div class="col-lg-2" id="polybtn"><p><i class="fa fa-arrow-up" aria-hidden="true"></i>&nbsp;&nbsp; poly-alpha </p></div>
            </div>
            
            {{-- Erreur dans le cas oû fama mochkla--}}
            @if(!empty($error))
                <div class="col-lg-12">
                    <center>
                        <div class="alert alert-danger">
                          <strong>Attention!</strong> {{$error}}
                        </div>
                    </center><br><br>
                </div>
            @endif
            
            {{-- Input de l'utilisateur --}}
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="box" id="encaffine">
                            <form method="POST" action="/">
                                    <input type="hidden" name="task" value="encaffine">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Chiffrement Affine</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="a" placeholder="a">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="b" placeholder="b">
                                    </div>
                    
                                    <button type="submit" class="btn btn-primary">Crypter</button>

                                </form>
                        </div>
                        <div class="box" id="encatranspose">
                            <center><p>I'm too lazy to complete this</p></center>
                            <!-- <form method="POST" action="/">
                                    <input type="hidden" name="task" value="encatranspose">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Chiffrement transposé matricielle</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="a" placeholder="donner la clé">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Crypter</button>
                                </form> -->
                        </div>
                        <div class="box" id="enccesar">
                            <form method="POST" action="/">
                                    <input type="hidden" name="task" value="enccesar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Chiffrement César</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="shift" placeholder="par combien on shifte?">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Crypter</button>
                                </form>
                        </div>
                        <div class="box" id="encvigenere">
                             <form method="POST" action="/">
                                    <input type="hidden" name="task" value="encvigenere">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Chiffrement vigénère</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cle" placeholder="donner la clé">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Crypter</button>
                                </form> 
                        </div>
                        <div class="box" id="encmono">
                             <form method="POST" action="/">
                                    <input type="hidden" name="task" value="encmono">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Chiffrement mono-alphabétique hasard</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Crypter</button>
                                </form> 
                        </div>
                        <div class="box" id="encpoly">
                             <form method="POST" action="/">
                                    <input type="hidden" name="task" value="encpoly">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Chiffrement poly-alphabétique hasard</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Crypter</button>
                                </form>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="box" id="decaffine">
                            <!--<form method="POST" action="/">
                                    <input type="hidden" name="task" value="decaffine">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Déchiffrement Affine</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="a" placeholder="a">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="b" placeholder="b">
                                    </div>
                    
                                    <button type="submit" class="btn btn-primary">Décrypter</button>

                                </form>-->
                        </div>
                        <div class="box" id="dectranspose">
                            <center><p>il mouhim lokhrin yimchiw </p></center>
                            <!-- <form method="POST" action="/">
                                    <input type="hidden" name="task" value="dectranspose">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Déchiffrement transposé matricielle</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="a" placeholder="donner la clé">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Décrypter</button>
                                </form> -->
                        </div>
                        <div class="box" id="deccesar">
                            <form method="POST" action="/">
                                    <input type="hidden" name="task" value="deccesar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Déchiffrement César</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="shift" placeholder="par combien on shifte?">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Décrypter</button>
                                </form>
                        </div>
                        <div class="box" id="decvigenere">
                             <form method="POST" action="/">
                                    <input type="hidden" name="task" value="decvigenere">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Déchiffrement vigénère</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cle" placeholder="donner la clé">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Décrypter</button>
                                </form> 
                        </div>
                        <div class="box" id="decmono">
                            <form method="POST" action="/">
                                    <input type="hidden" name="task" value="decmono">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Déchiffrement mono-alphabétique</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="a" placeholder="donner la clé">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Décrypter</button>
                                </form>
                        </div>
                        <div class="box" id="decpoly">
                            <!-- <form  method="POST" action="/">
                                    <input type="hidden" name="task" value="decpoly">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                      <p><center> Déchiffrement poly-alphabétique</center></p>
                                      <input type="text" class="form-control" name="message" placeholder="tapez votre message">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="a" placeholder="donner la clé">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Décrypter</button>
                                </form> -->
                        </div>
                    </div> 
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 result-box col-lg-offset-3">
                 @if(!empty($result) )
                <center>
                    <p>mot chiffré : {{$result}}</p>
                    
                </center>
                @endif
                @if(!empty($chiffre) && !empty($cle))
                <center>
                    <p>mot chiffré : {{$chiffre}}</p>
                    <p> table de codage : <br>
                    @foreach($cle as $cl)
                    {{$cl[0]}} - {{$cl[1]}} &nbsp;
                    @endforeach
                    </p>
                </center>
                @endif
            </div>
        </div>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

    $('.box').hide();

    $('#affbtn').click(function(){
        $('.box').hide();
        $('#encaffine').slideToggle(500);
         $('#decaffine').slideToggle(500);
    });

    $('#vigbtn').click(function(){
        $('.box').hide();
        $('#encvigenere').fadeIn(1000);
        $('#decvigenere').fadeIn(1000);
    });

    $('#cesbtn').click(function(){
        $('.box').hide();
        $('#enccesar').slideToggle(500);
        $('#deccesar').slideToggle(500);
    });

    $('#transbtn').click(function(){
        $('.box').hide();
        $('#encatranspose').fadeIn(1000);
        $('#dectranspose').fadeIn(1000);
    });

     $('#monobtn').click(function(){
        $('.box').hide();
        $('#encmono').fadeIn(1000);
        $('#decmono').fadeIn(1000);
    });

      $('#polybtn').click(function(){
        $('.box').hide();
        $('#encpoly').fadeIn(1000);
        $('#decpoly').fadeIn(1000);
    });

</script>
</html>
