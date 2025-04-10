<?php

namespace App\Http\Controllers;

use App\Models\Category; // Assuming you need navigation
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Exibe o formulário de contato.
     *
     * @return View
     */
    public function show(): View
    {
        $navigation = Category::all(); // Assuming you need navigation
        return view('contact', ['navigation' => $navigation, 'from' => '', 'message' => '', 'errors' => [], 'success' => '']);
    }

    /**
     * Processa o envio do formulário de contato.
     *
     * @param Request $request O objeto da requisição HTTP.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        $adminEmail = config('mail.from.address'); // Get admin email from config
        $subject = "Mensagem do formulário de contato de " . $request->input('email');
        $messageText = $request->input('message');

        try {
            Mail::raw($messageText, function ($mail) use ($adminEmail, $request, $subject) {
                $mail->from($request->input('email'));
                $mail->to($adminEmail);
                $mail->subject($subject);
            });

            return Redirect::route('contact.show')->with('success', 'Sua mensagem foi enviada.');

        } catch (\Exception $e) {
            // Log the error: \Log::error('Contact form error: ' . $e->getMessage());
            return Redirect::route('contact.show')->withErrors(['warning' => 'Houve um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.'])->withInput();
        }
    }
}
