        <div id="content">
            <div class="tramites heading">
                <h1 class="text-center">Trámites online</h1></div>
            <div>
                <ul class="nav nav-tabs nav-justified" id="tabs-tramites">
                    <li class="active"><a href="#solicitud" role="tab" data-toggle="tab">Solicitud Beauty Card</a></li>
                    <li class="hidden"><a href="#tab-2" role="tab" data-toggle="tab">Modificación de datos</a></li>
                    <li class="hidden"><a href="#tab-3" role="tab" data-toggle="tab">Canje de puntos</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="solicitud">
                        <form name="solicitud" id="form-solicitud" action="enviar-solicitud.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 tramites contenido">
                                    <h4>DATOS PERSONALES DEL TITULAR</h4>
                                    <fieldset form="solicitud">
                                        <label for="nombre">Nombre y apellido:</label>
                                        <input class="form-control" type="text" name="nombre" id="nombre">
                                        <small class="nombre invalid hidden">Ingrese su nombre y apellido.</small>
                                        <div class="input-col">
                                            <label for="cedula">Cédula <small>(sin puntos ni guiones)</small>:</label>
                                            <input class="form-control" type="telefono" name="cedula" id="cedula">
                                            <small class="cedula invalid hidden">Ingrese una cédula válida de 8 dígitos.</small>
                                        </div>
                                        <div class="input-der input-col">
                                            <label for="nacimiento">Fecha de nacimiento:</label>
                                            <input class="form-control" type="text" name="nacimiento" id="nacimiento">
                                            <small class="nacimiento invalid hidden">Ingrese su fecha de nacimiento.<br/>Debe ser mayor de 18 años.</small>
                                        </div>
                                        <div class="input-col">
                                            <label for="telefono">Teléfono:<small> (8 digitos)</small></label>
                                            <input class="form-control" type="telephone" id="telefono" name="telefono">
                                            <small class="telefono invalid hidden">Por favor ingrese teléfono o celular válido.</small>
                                        </div>
                                        <div class="input-der input-col">
                                            <label for="celular">Celular:<small> (9 digitos)</small></label>
                                            <input class="form-control" type="telephone" name="celular" id="celular">
                                        </div>
                                        <label for="domicilio">Domicilio:</label>
                                        <input class="form-control" type="text" name="domicilio" id="domicilio">
                                        <small class="domicilio invalid hidden">Ingrese su domicilio.</small>
                                        <div class="input-col">
                                            <label for="departamento">Departamento:</label>
                                            <select class="selectpicker form-control" name="departamento" id="departamento">
                                                <option value="Montevideo" selected="">Montevideo</option>
                                                <option value="Artigas">Artigas</option>
                                                <option value="Canelones">Canelones</option>
                                                <option value="Cerro Largo">Cerro Largo</option>
                                                <option value="Colonia">Colonia</option>
                                                <option value="Durazno">Durazno</option>
                                                <option value="Flores">Flores</option>
                                                <option value="Florida">Florida</option>
                                                <option value="Lavalleja">Lavalleja</option>
                                                <option value="Maldonado">Maldonado</option>
                                                <option value="Paysandú">Paysandú</option>
                                                <option value="Río Negro">Río Negro</option>
                                                <option value="Rivera">Rivera</option>
                                                <option value="Rocha">Rocha</option>
                                                <option value="Salto">Salto</option>
                                                <option value="San José">San José</option>
                                                <option value="Soriano">Soriano</option>
                                                <option value="Tacuarembó">Tacuarembó</option>
                                                <option value="Treinta y Tres">Treinta y Tres</option>
                                            </select>
                                            <small class="departamento invalid hidden">Seleccione su departamento.</small>
                                        </div>
                                        <div class="input-der input-col">
                                            <label for="ciudad">Ciudad:</label>
                                            <input class="form-control" type="text" name="ciudad" id="ciudad">
                                            <small class="ciudad invalid hidden">Ingrese su ciudad.</small>
                                        </div>
                                        <label for="razon-social">Razón social:</label>
                                        <input class="form-control" type="text" id="razon-social" name="razon-social">
                                        <small class="razon-social invalid hidden">Si ingresa RUT debe ingresar Razón Social.</small>
                                        <label for="rut">RUT:</label>
                                        <input class="form-control" type="telephone" id="rut" name="rut">
                                        <small class="rut invalid hidden">Si ingresa Razón Social debe ingresar RUT.</small>
                                        <label for="email">E-mail: </label>
                                        <input class="form-control" type="email" id="email" name="email">
                                        <small class="email invalid hidden">Ingrese un email válido.</small>
                                        <div class="visible-xs-block visible-sm-block visible-md-inline-block visible-lg-inline-block" id="img-div">
                                            <div class="visible-xs-block visible-sm-block visible-md-inline-block visible-lg-inline-block" id="img"><i id="cam-icon" class="glyphicon glyphicon-camera"></i></div>
                                            <div class="visible-xs-block visible-sm-block visible-md-inline-block visible-lg-inline-block" id="img-input">
                                                <label for="archivo">Cargar foto de diploma u otro aval Profesional:</label>
                                                <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                                <input type="file" accept="image/*" name="fichero-imagen" id="archivo">
                                                <small class="archivo invalid hidden">Suba una imagen de un Aval Profesional.</small>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 tramites contenido">
                                    <fieldset form="solicitud">
                                        <h4>DATOS PROFESIONALES DEL TITULAR</h4>
                                        <label class="visible-xs-block visible-sm-block visible-md-block visible-lg-block">Área:</label>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="1" value="1">
                                                <label for="1">1.Peluquería</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="2" value="2">
                                                <label for="2">2.Estética</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="3" value="3">
                                                <label for="3">3.Maquillaje</label>
                                            </div>
                                            <small class="area invalid hidden">Seleccione su área de trabajo.</small>
                                        </div>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="4" value="4">
                                                <label for="4">4.Cosmetología </label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="5" value="5">
                                                <label for="5">5.Podología </label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="6" value="6">
                                                <label for="6">6.Manicuría </label>
                                            </div>
                                        </div>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="7" value="7">
                                                <label for="7">7.Masajista </label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="8" value="8">
                                                <label for="8">8.Depilación </label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="area" id="9" value="9">
                                                <label for="9">9.Educación </label>
                                            </div>
                                        </div>
                                        <label class="visible-xs-block visible-sm-block visible-md-block visible-lg-block">Institución:</label>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="01" value="01">
                                                <label for="01">01.CPP </label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="02" value="02">
                                                <label for="02">02.UPU </label>
                                            </div>
                                            <small class="institucion invalid hidden">Seleccione (si corresponde) una institución a la que pertenezcas.</small>
                                        </div>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="03" value="03">
                                                <label for="03">03.CAT </label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="04" value="04">
                                                <label for="04">04.ACMU </label>
                                            </div>
                                        </div>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="05" value="05">
                                                <label for="05">05.AMU </label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="06" value="06">
                                                <label for="06">06.AAMEDU </label>
                                            </div>
                                        </div>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="07" value="07">
                                                <label for="07">07.APU</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="institucion" id="08" value="08">
                                                <label for="08">08.Otra </label>
                                            </div>
                                        </div>
                                        <label class="visible-xs-block visible-sm-block visible-md-block visible-lg-block">Rol:</label>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="11" value="11">
                                                <label for="11">11.Empleado</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="22" value="22">
                                                <label for="22">22.Propietario</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="33" value="33">
                                                <label for="33">33.Socio</label>
                                            </div>
                                            <small class="rol invalid hidden">Seleccione el rol que corresponda.</small>
                                        </div>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="44" value="44">
                                                <label for="44">44.Domicilio</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="55" value="55">
                                                <label for="55">55.Otros</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="66" value="66">
                                                <label for="66">66.Estudiante</label>
                                            </div>
                                        </div>
                                        <div class="radio-col">
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="77" value="77">
                                                <label for="77">77.Proveedor</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="88" value="88">
                                                <label for="88">88.Distribuidor</label>
                                            </div>
                                            <div class="radio-input">
                                                <input type="radio" name="rol" id="99" value="99">
                                                <label for="99">99.Empresa</label>
                                            </div>
                                        </div>
                                        <h4>NOMBRES DE AUTORIZADOS</h4>
                                        <div class="input-col">
                                            <label for="nombre-aut-1">Nombre y apellido:</label>
                                            <input class="form-control form-control" type="text" name="nombre-aut-1" id="nombre-aut-1">
                                        </div>
                                        <div class="input-der input-col">
                                            <label for="cedula-aut-1">Cédula:</label>
                                            <input class="form-control form-control" type="telefono" max="8" min="8" name="cedula-aut-1" id="cedula-aut-1">
                                        </div>
                                        <div class="input-col">
                                            <label for="nombre-aut-2">Nombre y apellido:</label>
                                            <input class="form-control form-control" type="text" name="nombre-aut-2" id="nombre-aut-2">
                                        </div>
                                        <div class="input-der input-col">
                                            <label for="cedula-aut-2">Cédula:</label>
                                            <input class="form-control form-control" type="telefono" max="8" min="8" name="cedula-aut-2" id="cedula-aut-2">
                                        </div>
                                        <div id="terminos">
                                            <input type="checkbox" name="condiciones" id="condiciones">
                                            <label for="condiciones" >Acepto los <a data-target="#terminos-condiciones" data-toggle="modal" href="#">términos y condiciones</a> del Programa de Beneficios.</label>
                                            <div class="modal fade" role="dialog" tabindex="-1" id="terminos-condiciones">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div id="texto-condiciones">
                                                                <h1 class="text-center">Términos y Condiciones:</h1>
                                                                <p>1- La tarjeta Beauty Card es propiedad de Cosmética Profesional S.R.L. (en adelante Casani). La misma carece de valor comercial y únicamente se expide para identificar a sus clientes. No genera ningún tipo de obligación de compra por parte del solicitante ni compromiso de beneficios especiales por parte de Casani hacia este.</p>
                                                                <p>2- El titular de Beauty Card se compromete a usarla únicamente dentro de los locales Casani y en eventos organizados y/o patrocinados por Casani.</p>
                                                                <p>3- El titular es consciente que Beauty Card es exclusivamente de uso Profesional y en tal sentido se hace responsable de su correcto manejo respecto a terceras personas.</p>
                                                                <p>4- El nombre del titular en esta Solicitud, debe coincidir con su cédula y es su responsabilidad, mantener actualizados todos sus datos personales. El titular puede solicitar que en el plástico figure un nombre con el que se identifica, diferente al que figura en su cédula.</p>
                                                                <p>5- El titular podrá asignar hasta 2 personas debidamente autorizadas, para que puedan comprar a su nombre generándole los beneficios como titular.</p>
                                                                <p>6- Casani se guarda el derecho de hacer participar al titular en sus eventuales promociones, eventos y/o campañas de marketing, de acuerdo a su política y cronograma de Programas de Beneficios.</p>
                                                                <p>7- Casani se reserva el derecho de anular y retirar de circulación en cualquier momento, aquellas tarjetas que tengan un uso incorrecto, sin mediar explicación ni reparación de ninguna naturaleza al titular u otra persona vinculada a este.</p>
                                                                <p>8- Los beneficios de Beauty Card son intransferibles y vencen cumplido los 120 días de inactividad como cliente o a los 24 meses de haberse generado.</p>
                                                                <p>9- El titular tiene derecho a participar libremente de cualquier beneficio generado por el uso de la tarjeta de acuerdo a sus interesa y conveniencia.</p>
                                                                <p>10- En el momento de la compra el titular puede mostrar el plástico o mencionar la cédula. Para hacer uso del beneficio, es condición necesaria hacerlo personalmente, presentar cédula y la tarjeta plástica. También podrá hacerlo desde su mail -que figura en esta Solicitud- completando un documento electrónico que le proporcionará Casani. El beneficio se enviará por encomienda únicamente al domicilio que figura en esta Solicitud. </p>
                                                                <p>11- La validez de Beauty Card es por un año a partir de la emisión y se renovará automáticamente, si no hubiera aviso en contario por cualquiera de las partes. </p>
                                                                <p>12- Este trámite y la reposición del plástico -por extravío o deterioro- pueden tener costo.</p>
                                                                <p>13- La empresa podrá enviar novedades por e-mail pudiendo el cliente desuscribirse si lo desea.</p>
                                                                <p>14- El e-mail que figura en este formulario servirá como medio para solicitar los beneficios que genere la tarjeta, haciéndose responsable únicamente el cliente, y no teniendo nada que reclamar, ante el mal uso del mismo.</p>
                                                                <p>15- Se creará automáticamente una cuenta de usuario en el sitio web, la cual permitirá ver precios y comprar a través de el mismo.</p>
                                                                <h4 class="text-center">Los medios válidos que tiene la empresa para comunicar las novedades, promociones y las excepciones a cualquiera de los puntos anteriores, serán el facebook y/o el sitio oficial de Casani.</h4></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="condiciones invalid hidden">Tienes que aceptar los términos y condiciones del Programa.</small>

                                        <div id="btn-solicitud">
                                            <button id="btn-enviar" class="btn btn-default btn-enviar" type="submit">Enviar</button>
                                            <button class="btn btn-default btn-enviar" type="reset">Borrar </button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <p>Second tab content.</p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <p>Third tab content.</p>
                    </div>
                </div>
            </div>
        </div>