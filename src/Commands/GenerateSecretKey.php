<?php

namespace WemX\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Kernel;
use Pterodactyl\Traits\Commands\EnvironmentWriterTrait;
use Illuminate\Support\Str;

class GenerateSecretKey extends Command
{
    use EnvironmentWriterTrait;

    protected $description = 'Generate new SSO secret key for WemX';

    protected $signature = 'wemx:generate';

    /**
     * GenerateSecretKey constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle command execution.
     *
     * @throws \Pterodactyl\Exceptions\PterodactylException
     */
    public function handle(): int
    {
        $secret_key = $this->generate();
        $this->writeToEnvironment(['WEMX_SSO_SECRET' => $secret_key]);

        $this->info("Generated new secret key: $secret_key");
        return 0;
    }

    /**
     * Generate random secret key
     *
     * @return mixed
     */
    protected function generate()
    {
      return Str::random(48);
    }
}
