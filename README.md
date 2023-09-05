# Laravel Nova Edit .env

O pacote Laravel Nova Edit .env é uma ferramenta que permite editar as variáveis de ambiente do seu aplicativo Laravel diretamente através da interface do Laravel Nova.

## Instalação

1. Execute o comando abaixo para instalar o pacote:

   ```shell
   composer require eduardoaraujo01/nova-env
   ```
   
## Uso

Depois de instalar o pacote, acesse o resouce do Laravel Nova. 
Você verá uma nova ferramenta para editar as variáveis de ambiente. 
Siga as instruções na interface para fazer as edições necessárias.

 ```injectablephp
    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request): array
    {
        return [
            new NovaEnv,
        ];
    }
    
    // OR

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request): array
    {
        return [
            (new NovaEnv)->canSee(function ($request) {
                return $request->user()->isSuperAdmin();
            }),
        ];
    }
 ```

## Suporte

Se tiver dúvidas, encontrou um bug ou deseja contribuir com melhorias, entre em contato conosco em [dev.eduardoaraujo@gmail.com](mailto:dev.eduardoaraujo@gmail.com).

Aproveite o Laravel Nova Edit .env para simplificar a gestão das variáveis de ambiente no seu projeto Laravel.