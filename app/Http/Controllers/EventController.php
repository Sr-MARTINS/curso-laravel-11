<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {

        //estamos passando a Class 'EventModel' q é a class q guarda nossas operações 
        //passaremso o metodo static 'all( )' onde com ele conseguiremos pegar todos eventos do banco
        $events = Event::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event();

        $event->title       = $request->title;

        $event->date        = $request->date;

        $event->description = $request->description;
        $event->city        = $request->city;
        $event->private     = $request->private;

        $event->items       = $request->items;


            // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

                //Estamos armazenando em "$resquestImage" o arquivo q foi enviado pela requisição com o nome de "image"
            $requestImage = $request->image;

                //ultilizando o metodo 'extensio()' vamos pegar o formato, ou melhor a extenção 
                // ( .jpg , .png ) 
            $extension = $requestImage->extension();

                //Passaremos dentro do "md5()" o '$requestImage->getClientOriginalName()' junto o strtotime("now"), ou seja estamos concatenando o nome q foi pego pelo getClientOriginalName, com o timestamp da hr q o arquivo foi pego
                
                // concatenando os dois do "md5" estamos fazerndo uma emcriptação do nome do arquivo com 36 caracteres para q nao tenhamos conflito com os nomes da img ao salvarmos elas
                
                //Depois concatenarem o "md5" com o "$extensio" para q possamos adcionar o tipo do aquivo para a img q queremos salvar
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension;

                //Aq estamos movendo a img para a pasta "img/events" q foi gerada
                // Ultilizando o "pulic_path" consigeremos acessar todo o caminho para a pasta public do Laravel
            $request->image->move(public_path('img/events'), $imageName);

                // Salvaremos  o nome da img no atributo "image" do modelo $event, para q ele possa ser armazenado no bando de dados
            $event->image = $imageName;
        }


        #Aq no controller, faremos o acesso ao usuario apartir do metodo "auth()" q nos da acesso ao user(), q é o usuario logado
        // $user = auth()->user(); 
        $user = Auth::user();
        
        # E a passaremos q o nossa class de envent vai estanciar o 'user_id' e dessa forma vamos preencher o campo de id de usuario

        # SO Q DESSA FORMA CONSEGUIREMOS TER ACESSEÇO MSM DESLOGADO E NAO É ISSO Q QUEREMOS 
        #   ENTT NO ARQUIVO DE ROUTS TEREMOS Q FAZER UMA MODIFICAÇÃO
        $event->user_id = $user->id;


        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }

    public function show($id) 
    {
        $event = Event::findOrfail($id);

        $user = Auth::user();
        $hasUserJoined = false;

        if($user) {

            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

            //usando do Model User o metodo "where" metodo esse q filtra nossas consultas;
            //  dai passamos o 'id' como primeiro argumento, logo apos passamnos o 
            //  "$event->user_id" pois queremos q o id da pesquisa seja o msm id do usuario

            // dai passamos o filter() pois ele nos retorna o primeiro item, logo apos usaremso o toArray() para transformarmos nossa item em um
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard()
    {
        // Nesse metodo vamos pegar o usuario logado 
        // $user = auth()->user();
        $user = Auth::user();

        // Dai associoaremso o usuario ao evento 
        $event  = $user->events;

            //Estamos armazenando todos os usarios cim seus eventos
        $eventsAsParticipant = $user->eventsAsParticipant;

            //Logo apos direcionaremo ele para sua pagina de envonts(area adminstrativa)
        return view('events.dashboard', ['event' => $event, 'eventsAsParticipant' => $eventsAsParticipant]);
    }

    public function destroy($id)
    {
            //Medoto esta para fazer o delete d eventos
            //  passamos o fildOrfail($id) pois queremos pegar no banco o item com o determinado id, apos isso, logo ao encontrar, deletaremos ele
        Event::findOrfail($id)->delete();

            //Apos deletarmos redirecionaremos para pagina dos nss eventos dando uma msg de sucesso
        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }


        //Metodo para buscarmos o usuario pelo id e direcioanermos para a pagina de atualização
    public function edit($id)
    {
         //Pedgando usuario logado
        $user = Auth::user();

            //Metodo q pega o item pelo id
        $event = Event::findOrfail($id);

            //Condição passado para q so podesse editar quem for dono do evento
        if($user->id != $event->user->id) {
            return redirect('/dashboard');
        }

            //Direcionando para a pagina q var ter as informações e poderemos editar
        return view('events.edit', ['event' => $event]);
    }

        //Metodo q vai atualizar o os daddos
    public function update(Request $request)
    {
        $data = $request->all();

            // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();
                    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." .$extension;

            $request->image->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        Event::findOrfail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso');
    }

    public function joinEvent($id)
    {
        //verificando o usuario logado
        $user = Auth::user();

            //e passando o "attach($id)" entrelaçaremos o id do evento ao id do isuario
        $user->eventsAsParticipant()->attach($id);

            //buscaremos o usuario
        $event = Event::findOrfail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença esta confirmada no evento ' . $event->title);
    }

    public function leaveEvent($id)
    {
        $user = Auth::user();

            //Passaremos o "detach()" pois queremos remover a ligação de usuario e evento
        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrfail($id);

        return redirect('/dashboard')->with('msg', 'Ligação com evento removida '.$event->title);
    }
}
