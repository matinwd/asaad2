<?php
    namespace App\Jobs;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\Log;
    use SoapClient;

    class SendSMSJob implements ShouldQueue
    {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mobile;
    protected $pattern;
    protected $data;

    public function __construct($mobile, $pattern, $data = [])
    {
    $this->mobile = $mobile;
    $this->pattern = $pattern;
    $this->data = $data;
    }

    /**
    * Execute the job.
    *
    * @return void
    */
    public function handle()
    {
    // todo : Panel SMS
    $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
    $user = "darima";
    $pass = "dar768ima";
    $fromNum = "+9810004223";

    $status = $client->sendPatternSms($fromNum, [$this->mobile], $user, $pass, $this->pattern, $this->data);

    Log::info("panel sms status", [$status]);
    Log::info("panel sms => mobile:{$this->mobile} // pattern:{$this->pattern}", $this->data);
    }
    }