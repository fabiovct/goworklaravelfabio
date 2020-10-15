import React from 'react';
import { Switch, Route } from 'react-router-dom';
import PrivateRoute from './rotasPrivadas'

import Home from './pages/home';
import HomeUsuario from './pages/homeUsuario';

import Extrato from './pages/extrato';
import ExtratoConta from './pages/extrato/extrato_conta';
import ExtratoCartao from './pages/extrato/extrato_cartao';

import Deposito from './pages/deposito';
import Transferencia from './pages/transferencia';

import ComprovantesConta from './pages/comprovantes/comprovantes_conta';
import ComprovantesCartao from './pages/comprovantes/comprovantes_cartao';

import TransferenciaInterna from './pages/transferencia/transferencia_interna';
import TransferenciaOutros from './pages/transferencia/transferencia_outros';

import Pagar from './pages/pagar';
import Cobrancas from './pages/cobrancas';
import CadastroSacado from './pages/cobrancas/cadastro_sacado';
import EditarSacado from './pages/cobrancas/editar_sacado';
import BoletoCobranca from './pages/cobrancas/gerar_boleto';
import Cartoes from './pages/cartoes';
import Servicos from './pages/servicos';
import Maquininha from './pages/maquininha';
import CadastroMaquininha from './pages/maquininha/cadastro-maquininha';
import Mimos from './pages/mimos';
import Beneficios from './pages/beneficios';
import ProdutosBancarios from './pages/produtosBancarios';
import config from './config/env';
import SolicitarMicroCredito from './pages/produtosBancarios/solicitar-micro-credito';
import ListaMicroCredito from './pages/produtosBancarios/micro-credito-ativo';
import Comprovante from './pages/comprovantes';
//import AtivarCartao from './pages/cartoes/ativar_cartao';
//import RecargaBoletoCartao from './pages/cartoes/boleto_recarga_cartao';
//import Transferencia2p2 from './pages/cartoes/transferencia_2p2';
import Investimentos from './pages/investimentos';
import Cashback from './pages/cashback';
import MultiplosBoletos from './pages/cobrancas/multiplos_boletos';
//import IndexMultiplosBoletos from './pages/cobrancas/index_multiplos_boletos';
import GerenciarMultiplosBoletos from './pages/cobrancas/gerenciar_multiplos_boletos';
import GerenciarLotesBoletos from './pages/cobrancas/gerenciar_lotes';
import GerenciarPagadores from './pages/cobrancas/gerenciar_sacado';
import notFoundPage from './pages/notFoundPage';

function Routes() {
            
    return (
      
            <Switch>
                <Route path="/" exact component={Home}/>
                <PrivateRoute path="/homeUsuario" exact component={HomeUsuario} isPrivate/>

                <PrivateRoute path="/extrato" exact component={Extrato} isPrivate isBloqued={config.extrato}/>
                <PrivateRoute path="/extrato-conta" exact component={ExtratoConta} isPrivate isBloqued={config.extratoConta}/>
                <PrivateRoute path="/extrato-cartao" exact component={ExtratoCartao} isPrivate isBloqued={config.extratoCartao}/>

                <PrivateRoute path="/deposito" exact component={Deposito} isPrivate isBloqued={config.deposito}/>

                <PrivateRoute path="/transferencia" exact component={Transferencia} isPrivate isBloqued={config.transferencia}/>
                <PrivateRoute path="/transferencia-interna" exact component={TransferenciaInterna} isPrivate isBloqued={config.TransferenciaInterna}/>
                <PrivateRoute path="/transferencia-outros" exact component={TransferenciaOutros} isPrivate isBloqued={config.transferenciaOutros}/>

                <PrivateRoute path="/comprovantes" exact component={Comprovante} isPrivate isBloqued={config.comprovante}/>
                <PrivateRoute path="/comprovantes-conta" exact component={ComprovantesConta} isPrivate isBloqued={config.comprovantesConta}/>
                <PrivateRoute path="/comprovantes-cartao" exact component={ComprovantesCartao} isPrivate isBloqued={config.comprovantesCartao}/>

                <PrivateRoute path="/pagar" exact component={Pagar} isPrivate isBloqued={config.pagar}/>

                <PrivateRoute path="/cobrancas" exact component={Cobrancas} isPrivate isBloqued={config.cobrancas}/>
                <PrivateRoute path="/cobrancas-cadastro-pagador" exact component={CadastroSacado} isPrivate isBloqued={config.cadastroSacado}/>
                <PrivateRoute path="/cobrancas-editar-pagador/:id" exact component={EditarSacado} isPrivate isBloqued={config.editarSacado}/>
                <PrivateRoute path="/cobrancas-boleto" exact component={BoletoCobranca} isPrivate isBloqued={config.boletoCobranca}/>

                {/*<PrivateRoute path="/multiplos-boletos" exact component={IndexMultiplosBoletos} isPrivate isBloqued={config.idenxMultiplosBoletos}/>*/}
                <PrivateRoute path="/multiplos-boletos" exact component={MultiplosBoletos} isPrivate isBloqued={config.multiplosBoletos}/>
                <PrivateRoute path="/multiplos-boletos-gerenciar" exact component={GerenciarMultiplosBoletos} isPrivate isBloqued={config.gerenciarMultiplosBoletos}/>
                <PrivateRoute path="/lotes-boletos-gerenciar" exact component={GerenciarLotesBoletos} isPrivate isBloqued={config.gerenciarLotesBoletos}/>
                <PrivateRoute path="/gerenciar-pagadores" exact component={GerenciarPagadores} isPrivate isBloqued={config.gerenciarPagadores}/>

                <PrivateRoute path="/cartoes" exact component={Cartoes} isPrivate isBloqued={config.cartoes}/>
                {/*<PrivateRoute path="/recarga-boleto-cartao" exact component={RecargaBoletoCartao} isPrivate isBloqued={config.recargaBoletoCartao}/>*/}
                {/*<PrivateRoute path="/transferencia-2p2" exact component={Transferencia2p2} isPrivate isBloqued={config.Transferencia2p2}/>*/}
                {/*<PrivateRoute path="/ativar-cartao" exact component={AtivarCartao} isPrivate isBloqued={config.ativarCartao}/>*/}
                {/*<PrivateRoute path="/trocar-senha-cartao" exact component={TrocarSenhaCartao} isPrivate isBloqued={config.trocarSenhaCartao}/>*/}

                <PrivateRoute path="/servicos" exact component={Servicos} isPrivate isBloqued={config.servicos}/>

                <PrivateRoute path="/maquininha" exact component={Maquininha} isPrivate isBloqued={config.maquininha}/>
                <PrivateRoute path="/cadastro-maquininha" exact component={CadastroMaquininha} isPrivate isBloqued={config.cadastroMaquininha}/>

                <PrivateRoute path="/mimos" exact component={Mimos} isPrivate isBloqued={config.mimos}/>

                <PrivateRoute path="/beneficios" exact component={Beneficios} isPrivate isBloqued={config.beneficios}/>

                <PrivateRoute path="/produtos-bancarios" exact component={ProdutosBancarios} isPrivate isBloqued={config.produtosBancarios}/>
                <PrivateRoute path="/solicitar-micro-credito" exact component={SolicitarMicroCredito} isPrivate isBloqued={config.solicitarMicrocredito}/>
                <PrivateRoute path="/micro-credito-lista" exact component={ListaMicroCredito} isPrivate isBloqued={config.listarMicrocredito}/>

                <PrivateRoute path="/investimentos" exact component={Investimentos} isPrivate isBloqued={config.investimentos}/>

                <PrivateRoute path="/cashback" exact component={Cashback} isPrivate isBloqued={config.cashback}/>

                <PrivateRoute path = "*" component = {notFoundPage} isPrivate  />
                
            </Switch>
        
    );
}


export default Routes;