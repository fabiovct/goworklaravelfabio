import React from 'react';
//import '../node_modules/bootstrap/dist/css/bootstrap.css';
import Routes from './routes';
import Header from './components/header';
import {BrowserRouter } from 'react-router-dom';
import SideBar from './components/sideBar';
import Footer from './components/footer';
import { Col, Container, Row } from 'react-bootstrap';

function App() {

  return (
    <BrowserRouter>
    
      <div className="App Site fundo-login">
        <div className="Site-content">
          <div className="App-header">
            <Header/>
            
          </div>
          <div className="main">
            <Container fluid>
              <Row>
              <Col className="col-lg-2">
          <SideBar/>
          </Col>
          <Col className="col-lg-10">
            <Routes />
            </Col>
            </Row>
            </Container>
          </div>
          
        </div>
        <Footer/>
      </div>
      
    </BrowserRouter>


  );
}

export default App;