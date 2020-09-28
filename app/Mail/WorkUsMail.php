<?php

namespace App\Mail;

use App\WorkUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WorkUsMail extends Mailable
{
	use Queueable, SerializesModels;

	protected $workus;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(WorkUs $workus)
	{
		$this->workus = $workus;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from('support@psicologiachile.cl')->subject("Formulario Trabaja con Nosotros")->view('email.workus-mail')->with([
			'name' => $this->workus->name,
			'email' => $this->workus->mail,
			'phone' => $this->workus->phone,
		])->attach(public_path($this->workus->cv));
	}
}
