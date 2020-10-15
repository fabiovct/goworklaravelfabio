import React, { useState } from 'react';
import PropTypes from 'prop-types'
import {Route} from 'react-router-dom'
import api from './services/api';


export default function RouteWrapper({
    component: Component,
    isPrivate = false,
    isBloqued,
    ...rest
}){

    const [token, setToken] = useState();
      
      async function valida(){
          if(localStorage['token']){

          
        const data = {
            "token": localStorage['token'],
          };
          await api.post('index.php?r=usuario%2Fvalida-token',data ,{})
        .then(function(v){
            setToken(v.data)
            localStorage.setItem('token',v.data)
            //return v.data
        })
        }else{
            setToken(false)
        }
      }
      valida();

      const  signed = token;

      if((signed===false && isPrivate) || isBloqued===false){
          return window.location.pathname='/'
      }
      
    return <Route {...rest} component={Component} />

}


RouteWrapper.propTypes = {
    isPrivate: PropTypes.bool,
    component: PropTypes.oneOfType([PropTypes.element, PropTypes.func])
    .isRequired,
};

RouteWrapper.defaultProps = {
    isPrivate: false,
};



