<?php

namespace App\Mail;

use App\Voluntary;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VoluntaryMail extends Mailable
{
	use Queueable, SerializesModels;

	protected $voluntary;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Voluntary $voluntary)
	{
		$this->voluntary = $voluntary;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from('support@psicologiachile.cl')->subject("Formulario Voluntario")->view('email.voluntary-mail')->with([
			'name' => $this->voluntary->name,
			'email' => $this->voluntary->email,
			'phone' => $this->voluntary->phone,
			'msg' => $this->voluntary->message,
		]);
	}
}
