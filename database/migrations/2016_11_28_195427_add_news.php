<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->text('content');
        });

        DB::table('news')->insert(
            array(
                'id'=> '5',
                'title' => 'Morientes diz que Ronaldo pode fazer mossa em Camp Nou sozinho no ataque',
                'user_id'=> '3',
                'content'=> 'Fernando Morientes, antigo avançado espanhol que se notabilizou ao serviço do Real Madrid, acredita que Cristiano Ronaldo poderá surgir na posição de ponta-de-lança no clássico com o Barcelona, no próximo sábado, em Camp Nou.',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );



        DB::table('news')->insert(
            array(
                'id'=> '6',
                'title' => 'Bale operado com sucesso em Londres',
                'user_id'=> '2',
                'content'=> 'Gareth Bale foi esta terça-feira submetido com sucesso a uma intervenção cirúrgica à lesão dos tendões peroniais do tornozelo direito, contraída durante o jogo da Liga dos Campeões com o Sporting, em Alvalade.',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('news')->insert(
            array(
                'id'=> '9',
                'title' => 'Ronaldo e Pepe na lista para integrar melhor onze do ano',
                'user_id'=> '1',
                'content'=> 'Cristiano Ronaldo e Pepe estão na lista dos últimos 55 jogadores nomeados para integrar o melhor onze do ano, divulgada esta quinta-feira pela FIFPro, em parceria com a FIFA.',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );



        DB::table('news')->insert(
            array(
                'id'=> '10',
                'title' => '«Estou contente por Enzo como pai e treinador» - Zidane',
                'user_id'=> '3',
                'content'=> 'Zinedine Zidane, treinador do Real Madrid e pai de Enzo Zidane, não escondeu a satisfação pela estreia do filho a marcar com a camisola do Real Madrid. Na goleada ao Cultural Leonesa por 6-1, Enzo apontou o 4.º golo da equipa madrilena.',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('news')->insert(
            array(
                'id'=> '11',
                'title' => '«Os números de Ronaldo são impressionantes e indiscutíveis» - Xabi Alonso',
                'user_id'=> '3',
                'content'=> 'O médio Xabi Alonso, companheiro de Cristiano Ronaldo entre 2009 e 2014 no Real Madrid, considera que o rendimento do internacional português é tão impressionante como indiscutível.\r\n\r\n«Enquanto meter 50 golos por época...',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );


        DB::table('news')->insert(
            array(
                'id'=> '13',
                'title' => 'Ronaldo nega problemas com autoridades fiscais',
                'user_id'=> '3',
                'content'=> 'Os espanhóis do El Confidencial publicaram esta quarta-feira um artigo em que analisam alguns dos movimentos financeiros do internacional português e craque do Real Madrid, com base em documentos na posse do Football Leakes a que a publicação diz ter tido',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('news')->insert(
            array(
                'id'=> '14',
                'title' => 'Pepe e Casillas no galarim dos apetecíveis para janeiro',
                'user_id'=> '3',
                'content'=> 'O defesa central português Pepe, do Real Madrid, e o guardião espanhol do FC Porto, Iker Casillas, são alguns dos jogadores mais apetecíveis cujos contratos terminam a 30 de junho próximo e que, a partir de 1 de janeiro, poderão comprometer-se com novos emblemas a partir do verão, como jogadores livres, considerou o ‘L’Équipe’, na sua lista de elite divulgada neste domingo de Natal.\r\n\r\nO prestigiado diário francês aventa o cenário de Iker Casillas, de 35 anos, poder terminar a carreira uma vez concluído o vínculo aos dragões.\r\n\r\nMas também o guardião internacional titular do País de Gales, Wayne Hennessey (29 anos), com a titularidade no Crystal Palace (Inglaterra) tapada por Steve Mandanda, poderá ser uma boa opção para os emblemas que procuram guarda-redes. Tal como outro espanhol, Miguel Angel Moya (32 anos), do Atlético de Madrid.\r\n\r\nÉ no capítulo dos defesas mais apetecíveis que, ainda sem renovar para além de junho de 2017, poderão comprometer-se dentro de sete dias por outros clubes para a a partir de 1 de julho do próximo ano, que surge Pepe, de 33 anos, melhor defesa do Euro-2016.\r\n\r\nInterrogam-se os gauleses sobre qual o destino que pretenderá dar à sua carreira. Mas também o alemão Per Mertesacker (32 anos), que perdeu o seu lugar no onze de Arséne Wenger no Arsenal (Inglaterra) surge entre os potenciais alvos de maior cobiça.\r\n\r\nA seu lado surge Aurélien Chedjou, de 31 anos, do Galatasaray (Turquia): os franceses apontam o Olympique de Marselha como estando interessado no central internacional camaronês.\r\n\r\nMas é quanto a laterais, esquerdos ou direitos, que a lista de alvos apetecíveis no mercado já em janeiro é mais extensa, com sete jogadores bem identificados como oportunidade soberana. \r\nNeste lote cabem os franceses Bacary Sagna, de 33 anos (Manchester City, Inglaterra), Gaël Clichy, de 31 anos (Manchester City, Inglaterra) e Benoît Trémoulinas, de 30 anos (Sevilha, Espanha, este a recuperar de lesão num menisco).\r\n\r\nMas também o consagrado sérvio Branislav Ivanovic, de 32 anos (Chelsea, Inglaterra) e o suíço Stephan Lichtsteiner, de 32 anos (Juventus de Turim, Itália), este último fora das opções habituais de Massimiliano Allegri na velha senhora são alvos a considerar nas contas.\r\n\r\nO uruguaio Pablo Zabaleta, de 31 anos (Man. City, Inglaterra) e um dos pupilos de José Mourinho no Manchester United, o equatoriano Antonio Valencia, de 31 anos, estão ainda entre o lote de consagrados a jogarem nos dois gigantes de Manchester que podem firmar em janeiro novos contratos para mudar de ares no verão de 2017.\r\n\r\nApetecíveis, mas para a intermediária, afiguram-se ainda o médio internacional italiano Daniele De Rossi, de 33 anos (AS Roma), o espanhol Santi Cazorla, de 32 anos (Arsenal. Inglaterra) e… o antigo centrocampista benfiquista e internacional belga Axel Witsel, de 27 anos, ainda no Zénit de São Petersburgo (Rússia): os franceses admitem, no entanto, que Witsel não deverá escapar à malha da Juventus já em janeiro, embora o emblema italiano tenha mais concorrentes.\r\n\r\nA confirmar que o Man. City, orientado por Pep Guardiola, poderá ser o clube a sofrer mais com a sangria de jogadores a sair em fim de contrato, surge o médio internacional costa-marfinense Yaya Touré, de 33 anos, mas o salário, adverte a publicação francesa, pode ser impeditivo de tomo. \r\n\r\nTambém o Chelsea, e ainda em Inglaterra, poderá conhecer forte alívio na folha mensal de vencimentos, pois na lista de jogadores em final de contrato a 30 de junho próximo na equipa orientada pelo italiano Antonio Conte, líder da Premier League, está o médio internacional nigeriano John Obi Mikel, de 29 anos. \r\n\r\nOutro africano de créditos formados no futebol inglês que poderá mudar de ares por preço simbólico para o eventual comprador é o costa-marfinense Cheik Tioté, de 30 anos (Newcastle), pouco utilizado pelo treinador espanhol Rafa Benitez no clube. Cenário idêntico ao do senegalês Cheikh Ndoye, de 30 anos (Angers, França). \r\n\r\nAbundância no ataque\r\n\r\nMas é no setor mais adiantado, e para golos, que os tubarões do futebol europeu deitam o olho a oportunidades imperdíveis dos denominados jogadores a custo zero, que, na prática, nunca o são, mas cuja aquisição em final de contrato com os atuais patrões representará pode representar investimento de retorno garantido.\r\n\r\nO extremo internacional holandês Arjen Robben, de 32 anos, companheiro de equipa de Renato Sanches no Bayern Munique (Alemanha) estará no topo das prioridades dos clubes que equacionam contratar jogadores já experientes em condições financeiramente mais vantajosas já em janeiro. \r\n\r\nMas também no ataque o Man. City (Inglaterra) poderá ver abalar outras das suas pérolas, Jesus Navas, de 31 anos: óbice maior, o fato de o espanhol ser opção regular para o compatriota Pep Guardiola, que o chamou a jogo pelos citizens em 19 encontros da atual temporada.\r\n\r\nCompatriota do portista Yacine Brahimi e do ex-sportinguista Islam Slimani (Leicester), também o argelino Rachid Ghezzal, de 24 anos, está em final de contrato com o Lyon (França). \r\n\r\nE na lista de avançados que todos os decisores dos grandes emblemas vão, seguramente, passar os olhos antes do ataque às presas em janeiro figura também o camaronês Paul-Georges Ntep, de 24 anos (Rennes, França. \r\n\r\nO costa-marfinense Salomon Kalou, de 31 anos (Hertha de Berlim, Alemanha) também termina contrato a 31 de junho, mas tem sido trunfo na formação gernânica, onde é titular habitual e já apontou cinco golos na presente temporada, pelo que é esperado um convite para a renovação.\r\n\r\nMas porventura no topo das opções atacantes a considerar para muitos reforçarem as suas equipas está o brasileiro Taison Freda, de 28 anos, que o treinador português Paulo Fonseca não gostará, seguramente, de ver sair do plantel do Shakhtar Donetsk, tamanha é a sua preponderância decisiva.\r\n\r\nSe procuram um número nove puro, é apontar para o céu, ou lá perto, se o clube tiver posses para tanto: a estrela sueca Zlatan Ibrahimovic, de 35 anos, que José Mourinho resgatou no Paris Saint-Germain (PSG) no verão, termina o vínculo com o Manchester United a 30 de junho e ainda não renovou, como lembra o L’Équipe. \r\n\r\nTambém o inglês Saido Berahino, de 23 anos (West Bromwich Albion) desapareceu das opções do treinador do clube. E há, claro, SuperMario, o avançado internacional italiano Mario Balotelli, de 26 anos, no Nice (França)…\r\n\r\nPor último, também o avançado que deu o Euro-2008 à Espanha, ao apontar o golo solitário (1-0) na final, diante da Alemanha, poderá deixar o Vicente Calderón e Manzanares (Atlético de Madrid, Espanha): aos 32 anos, e com apenas três golos esta época pela equipa de Diego Simeone e onde pontifica o médio internacional português Tiago (além do ex-benfiquista Nico Gaitán), El niño Fernando Torres, poderá voltar a deixar o seu clube de sempre: está em final de contrato.',
                'created_at' => '2016-12-25 18:26:43',
                'updated_at' => '2016-12-25 18:26:43'
            )
        );


        DB::table('news')->insert(
            array(
                'id'=> '15',
                'title' => 'James Rodriguez celebra o Natal sem futuro definido',
                'user_id'=> '3',
                'content'=> 'James Rodriguez celebra o Natal sem futuro definido\', 3, \'O jogador do Real Madrid, James Rodriguez, fez questão de partilhar uma fotografia a desejar um bom Natal, ainda sem saber qual será o seu futuro depois do mercado de transferências.\r\n\r\n«Feliz Natal», escreveu o jogador no Instagram.\r\n\r\nSem ter o seu futuro definido, o colombiano tem sido associado a uma possível transferência para o Chelsea.',
                'created_at' => '2016-12-25 18:38:32',
                'updated_at' => '2016-12-25 18:38:32'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
