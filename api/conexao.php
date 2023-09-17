<!DOCTYPE html> 
 <html> 
 <head> 
   <title>Consulta de Dados</title> 
   <style> 
     body { 
       font-family: Arial, sans-serif; 
     } 
  
     .container { 
       max-width: 800px; 
       margin: 0 auto; 
       padding: 20px; 
       background-color: #f7f7f7; 
       border-radius: 6px; 
       box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
     } 
  
     h1 { 
       text-align: center; 
     } 
  
     table { 
       width: 100%; 
       border-collapse: collapse; 
       margin-top: 20px; 
     } 
  
     table th, table td { 
       padding: 8px; 
       text-align: left; 
       border-bottom: 1px solid #ddd; 
     } 
  
     table th { 
       background-color: #f2f2f2; 
     } 
  
     .delete-btn { 
       background: none; 
       border: none; 
       padding: 0; 
       cursor: pointer; 
     } 
  
     .delete-icon { 
       color: red; 
       font-size: 16px; 
       vertical-align: middle; 
     } 
   </style> 
 </head> 
 <body> 
   <?php 
   // URL da API do Xano para consulta de dados 
   $url = "https://x8ki-letl-twmt.n7.xano.io/api:anqWhhT_/auth/login"; 
  
   // Envia a solicitação GET para a API do Xano 
   $data = file_get_contents($url); 
  
   // Verifica se a solicitação foi bem-sucedida 
   if ($data === false) { 
     echo "<p>Ocorreu um erro ao obter os dados. Por favor, tente novamente mais tarde.</p>"; 
   } else { 
     $result = json_decode($data, true); 
  
     if (empty($result)) { 
       echo "<p>Não há dados disponíveis no momento.</p>"; 
     } else { 
       echo "<div class='container'>"; 
       echo "<h1>Dados do Banco de Dados</h1>"; 
       echo "<table>"; 
       echo "<tr><th>Nome</th><th>Email</th><th>Ação</th></tr>"; 
  
       foreach ($result as $row) { 
         echo "<tr>"; 
         echo "<td>" . $row['nome'] . "</td>"; 
         echo "<td>" . $row['email'] . "</td>"; 
         echo "<td><button class='delete-btn' onclick='deleteData(" . $row['id'] . ")'><span class='delete-icon'>&times;</span></button></td>"; 
         echo "</tr>"; 
       } 
  
       echo "</table>"; 
       echo "</div>"; 
     } 
   } 
   ?> 
  
   <script> 
     function deleteData(id) { 
       if (confirm("Tem certeza de que deseja excluir este item?")) { 
         // URL da API do Xano para exclusão de dados 
         var deleteUrl = "https://x8ki-letl-twmt.n7.xano.io/api:anqWhhT_/inser/" + id; 
  
         // Envia a solicitação DELETE para a API do Xano usando Fetch API 
         fetch(deleteUrl, { method: 'DELETE' }) 
           .then(response => { 
             if (response.ok) { 
               location.reload(); // Atualiza a página após a exclusão 
             } else { 
               console.log("Ocorreu um erro ao excluir o item."); 
             } 
           }) 
           .catch(error => console.log(error)); 
       } 
     } 
   </script> 
 </body> 
 </html>