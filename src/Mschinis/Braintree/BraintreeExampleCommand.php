<?php namespace Mschinis\Braintree;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;

class BraintreeExampleCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'braintree:example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the braintree example files.';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new reminder table command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $destination = $this->getPath('views') . '/braintreeTestView.blade.php';

        if ( ! $this->files->exists($destination))
        {
            $this->files->copy(__DIR__.'/stubs/testView.stub', $destination);

            $this->info('BraintreeTestView.blade.php created successfully!');
        }
        else
        {
            $this->error('BraintreeTestView.blade.php already exists!');
        }

        $destination = $this->getPath('controllers') . '/BraintreeController.php';

        if ( ! $this->files->exists($destination))
        {
            $this->files->copy(__DIR__.'/stubs/controller.stub', $destination);

            $this->info('BraintreeController.php created successfully!');
            $this->comment("");
            $this->comment("Add in your routes:");
            $this->comment("Route::controller('braintree', 'BraintreeController');");
            $this->info("");
            $this->info("To access the test view, navigate to /braintree/test-view");
        }
        else
        {
            $this->error('BraintreeController.php already exists!');
        }
    }

    /**
     * Get the path to the migration directory.
     *
     * @return string
     */
    private function getPath($loc)
    {
        if ( ! $path = $this->input->getOption('path'))
        {
            $path = $this->laravel['path'].'/'.$loc;
        }

        return rtrim($path, '/');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('path', null, InputOption::VALUE_OPTIONAL, 'The directory where the controller should be placed.', null),
        );
    }

}
