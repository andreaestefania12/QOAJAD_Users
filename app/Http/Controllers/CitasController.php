<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class CitasController extends Controller
{
/*RETORNAN SOLO VIEWS*/

    public function index()
    {   

    	return view('Citas.menuCitas');
    }
    public function editar()
    {   

        return view('Citas.editarBorrarCita');
    }

    public function verCita()
    {

        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $userDocument = ((new UsuarioController())->getUsuario())->DNI;
        $response = $client->request('GET',"/appointment/all_user_appointments/{$userDocument}",['headers' => ['authentication' => $jwt]]);
              
        $lista=json_decode($response->getBody()); 
        //dd($lista);
        return view('Citas.verCita',compact('lista'));
    }

/*GET IPS GET ESP*/

    public function getIPS()
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
       
        $response = $client->request('GET',"hpi/list_all",['headers' => ['authentication' => $jwt]]);
        
        $ipslist = json_decode($response->getBody());
        return($ipslist);
    }

    public function getESP($ips)
    {
        $client = (new ApiController())->getClient();
         $jwt =  (new ApiController())->getCookie();

            $response = $client->request('GET',"specialty/list_all/{$ips}",['headers' => ['authentication' => $jwt]] );

            $espelist = json_decode($response->getBody());
            return ($espelist);
    }

    public function getHorarios($ips, $esp)
    {
        $client = (new ApiController())->getClient();
            $jwt =  (new ApiController())->getCookie();

            $response = $client->request('GET',"appointment/all_available_appointments/{$ips}/{$esp}",['headers' => ['authentication' => $jwt]]);

            $horarios = json_decode($response->getBody());
            
            return($horarios);
    }


/*CREAR CITA*/

    public function crearCita()
    {
        $ipslist = $this->getIPS();   

        return view('Citas.crearCita', compact('ipslist'));
    }

    public function ipsCita($ips)
    {
        $espelist = $this->getESP($ips);

        return view('Citas.ipsCita', compact('espelist','ips'));
    }

    public function espCita(Request $request,$ips, $esp)
    {
        $horarios = $this->getHorarios($ips,$esp);
        $request->session()->put('ips',"{$ips}");

        return view('Citas.espCita', compact('horarios'));

    }

    public function guardarCita($doctorDocument,$date)
    {
        try {
            $user = json_decode(session()->get('usuario'));
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $ips = session()->get('ips');
        $date = date('M d, yy h:m:s A',strtotime($date));
        $appointment = [ 'patientDocument' => $user->DNI,'date' => $date, 'doctorDocument' => $doctorDocument, 'healthProviderInstituteName' => $ips];
        $json = json_encode($appointment);
         
        $client = new Client([
            'base_uri' => 'http://91.134.137.144:9092/appointment/create',
            'headers' => ['authentication' => $jwt , 'Content-Type' => 'application/json']
        ]); 

        $response = $client->request('POST','',['body' => $json]);

        Alert::success('Cita creada correctamente','Correcto');
            return redirect()->route('citasIndex');

        } catch (\Exception $e) {
            
            Alert::error('Hubo un error al crear la cita, intente más tarde','Error');
            return redirect()->route('citasIndex');
        }
    }

/*BORRAR CITA*/

    public function borrarCita()
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $userDocument = ((new UsuarioController())->getUsuario())->DNI;
        $response = $client->request('GET',"/appointment/all_user_appointments/{$userDocument}",['headers' => ['authentication' => $jwt]]);
              
        $lista=json_decode($response->getBody()); 
        //dd($lista);
    	return view('Citas.borrarCita',compact('lista'));
    }
    public function borrarConfirma($id)
    {
        try {
            $client = (new ApiController())->getClient();
            $jwt =  (new ApiController())->getCookie();

            $response = $client->request('delete',"appointment/delete/{$id}",['headers' => ['authentication' => $jwt]]);
            $userDocument = ((new UsuarioController())->getUsuario())->DNI;
            $response = $client->request('GET',"/appointment/all_user_appointments/{$userDocument}",['headers' => ['authentication' => $jwt]]);
            $lista=json_decode($response->getBody()); 
            
            Alert::success('Cita borrada correctamente','Correcto');
            return redirect()->route('borrarCita');

        } catch (\Exception $e) {
            
            Alert::error('Hubo un error al borrar la cita, intente más tarde','Error');
            return redirect()->route('citasIndex');
        }
        
    }

/*EDITAR CITA*/
    public function actualizarCita()
    {
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $userDocument = ((new UsuarioController())->getUsuario())->DNI;
        $response = $client->request('GET',"/appointment/all_user_appointments/{$userDocument}",['headers' => ['authentication' => $jwt]]);
              
        $lista=json_decode($response->getBody()); 

        return view('Citas.editarCita',compact('lista'));
    }

    public function actualizarIPS(Request $request, $id)
    {
        $request->session()->put('idCita',"{$id}");

        $ipslist = $this->getIPS();   

        return view('Citas.actualizarIPS', compact('ipslist'));
    }

    public function actualizarESP($ips)
    {
        $espelist = $this->getESP($ips);

        return view('Citas.actualizarESP', compact('espelist','ips'));
    }

    public function actualizarHorario(Request $request,$ips, $esp)
    {
        $horarios = $this->getHorarios($ips,$esp);
        $request->session()->put('ips',"{$ips}");

        return view('Citas.actualizarHorario', compact('horarios'));

    }

    public function guardarNuevaCita($doctorDocument,$date)
    {
        try {
            $user = json_decode(session()->get('usuario'));
        $client = (new ApiController())->getClient();
        $jwt =  (new ApiController())->getCookie();
        $ips = session()->get('ips');
        $idCita = session()->get('idCita');
        $date = date('M d, yy h:m:s A',strtotime($date));
        $appointment = ['id'=>$idCita, 'patientDocument' => $user->DNI,'date' => $date, 'doctorDocument' => $doctorDocument, 'healthProviderInstituteName' => $ips];
        $json = json_encode($appointment);
         
        $client = new Client([
            'base_uri' => 'http://91.134.137.144:9092/appointment/update',
            'headers' => ['authentication' => $jwt , 'Content-Type' => 'application/json']
        ]); 

        $response = $client->request('put','',['body' => $json]);

        Alert::success('Cita actualizada correctamente','Correcto');
            return redirect()->route('citasIndex');

        } catch (\Exception $e) {
            
            Alert::error('Hubo un error al actualizar la cita, intente más tarde','Error');
            return redirect()->route('citasIndex');
        }
    }



    
}
