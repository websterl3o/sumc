$(".botao_detalhes_req").click(function(){
                    var codPed = $(this).attr('codPedido');
                    var codTra = $(this).attr('codTra');
                    var codReq = $(this).attr('codreq');
                    var codAlu = $(this).attr('codAluno');
                            //alert('mudou o select');
                            $.ajax({//ajax que busca os campos do requerimento bem como sua descrição
                            url: "../executor/single_tramitacao.php", // PAGINA A SER CHAMADA
                            dataType: 'html', // TIPO DE RETORNO
                            type: 'post', // TIPO DE ENVIO POST OU GET
                            async: false, // REQUISIÇÃO SINCRONA OU ASSINCRONA,
                            data: {
                                'codPedido': codPed,
                                'codTramitacao': codTra,
                                'codRequerimento': codReq,
                                'codAlunoAcess': codAlu,
                            },
                            beforeSend: function(a) {
                                        a.overrideMimeType("text/plain;charset=\"iso-8859-1\"");
                                },
                            error: function() {
                                alert("Houve falha ao buscar as configurações do requerimento desejado. Gentileza informar o Suporte.");
                                    window.location.reload();
                            },
                            success: function(ajaxResposta) {
                                $("#single_req").html("");
                                $("#single_req").html(ajaxResposta);
                                //alert(ajaxResposta);
                            },
                    });
                        $('div#single_req').show();
                        });