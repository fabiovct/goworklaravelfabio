import React, { useState } from 'react';
import api from '../../services/api';

export default function Login() {
    const validate = localStorage.getItem('token');
    console.log(validate)
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    async function loginUser(event) {
        console.log(event)
        event.preventDefault();
        const data = {
            'email': email,
            'password': password
        };

        const response =  await api.post('api/login', data, {

        });
        if(response.data['token']){
            localStorage.setItem('token',response.data['token'])
            window.location.href = '/home';
        }
        
        
    }
    return (
        <div className="container col-4 mt-5">
            <div className="jumbotron">
            <form onSubmit = {loginUser}>
                <div className="form-group">
                    <label>Email</label>
                    <input
                        className="form-control" 
                        id="email"
                        placeholder="email@email.com.br"
                        value={email}
                        onChange={event => setEmail(event.target.value)}
                    />
                </div>
                <div className="form-group">
                    <label>password</label>
                    <input
                        className="form-control" 
                        id="password"
                        placeholder="password"
                        value={password}
                        onChange={event => setPassword(event.target.value)}
                    />
                </div>
                <button type="submit" className="btn btn-primary">Login</button>
            </form>
            </div>
        </div>
    )
}