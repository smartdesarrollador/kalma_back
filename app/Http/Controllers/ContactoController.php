<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
/* 6.- ENVIO-CORREO-V1-P1 */
use App\Mail\ContactoEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contacto;
/* /6.- ENVIO-CORREO-V1-P1 */
use Illuminate\Http\Response;

class ContactoController extends Controller
{
/* 7.- ENVIO-CORREO-V1-P1 */
     public function index()
    {
        $contactos = Contacto::all();
        return response()->json($contactos, Response::HTTP_OK);
    }



     public function sendContactForm(Request $request)
    {
        /* $data['nombre'] = $request->nombre;
        $nombre = $data['nombre']; */


    /* Mail::send('contacto', $data, function ($message) use ($data) {
      $message->to('prueba@iatecdigital.com', $data['nombre'])
      ->subject("Titulo del Mensaje");
    }); */

$data = [
        'nombre' => $request->input('nombre'),
        'correo' => $request->input('correo'),
        'telefono' => $request->input('telefono'),
        'asunto' => $request->input('asunto'),
        'mensaje' => $request->input('mensaje'),
    ];

    $correoForm = $request->input('correo');

    $email = new ContactoEmail($data);

    Mail::to($correoForm)->send($email);

// Validación de datos (puedes agregar validaciones adicionales según tus necesidades)
        /* $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:255',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]); */

        // Crear un nuevo objeto Contacto con los datos del formulario
        $contacto = new Contacto([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje'),
        ]);

        // Guardar el objeto en la base de datos
        $contacto->save();



    return response()->json([
      'Success' => 'Excelente email enviado..',
      'code' => '200',
    ],200);


    }
    /* /7.- ENVIO-CORREO-V1-P1 */
}
