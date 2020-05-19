import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import api from '../../services/api';

export default function Offices() {

    function deleteOffice(id) {
        api.post('api/escritorios/delete/'+id, { data: { id: id }})
           .then((result) => {
            //    const data = result.data.data
               //this.props.toggle()
               window.location.reload()
        })

    };

    const [offices, setOffices] = useState([]);

    useEffect(() => {
        
        async function loadOffices() {
            const response = await api.get('api/escritorios/list', {
            });
            setOffices(response.data)
    }
    loadOffices();
},
[]
)



    return (
        <>
        
        <div className="container">
        <h4>Escritorios</h4>
        
        <table className="table">
        <thead>
                <tr>
                    <th>#</th>
                    <th>Unidade</th>
                    <th>Operação</th>
                </tr>
        </thead>
            {offices.map(office => (
                    
                <tbody key={office.id}>
                <tr>
            <th>{office.id}</th>
                <td>{office.nome_escritorio}</td>
                <td>
                    <Link to={'offices/'+office.id}>
                    <button className="btn btn-primary btn-sm">Editar</button>
                    </Link>
                    <button 
                        className="btn btn-danger btn-sm ml-2" 
                        onClick={() => deleteOffice(office.id)}
                    >Excluir</button>
                </td>
                </tr>
                </tbody>
    
            
            ))}
            </table>
            <Link to="offices/new">
            <button className="btn btn-success btn-sm">Nova Unidade</button>
            </Link>
            <Link to="/home">
            <button className="btn btn-danger btn-sm ml-2">Voltar</button>
            </Link>
            
            
        </div>
        </>

    )



}