import api from '../../services/api';


export function deleteCustomer(id) {
          api.post('api/clientes/delete/'+id, { data: { id: id }})
             .then((result) => {
                 window.location.reload()
          })
  
      };