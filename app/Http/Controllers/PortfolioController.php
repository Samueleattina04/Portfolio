<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'name'      => 'Samuele Attinà',
            'role'      => 'IT Support & ICT Specialist | Web Developer',
            'subtitle'  => 'Consulenza Informatica · Sviluppo Web · Cybersecurity',
            'location'  => 'Adrano, Catania, Sicilia',
            'email'     => 'samueleattina04@gmail.com',
            'phone'     => '+39 340 489 2432',
            'whatsapp'  => '393404892432',
            'linkedin'  => 'https://www.linkedin.com/in/samuele-attin%C3%A0-194770263',

            'seo' => [
                'title'       => 'Samuele Attinà | IT Specialist & Web Developer – Adrano, Catania',
                'description' => 'Samuele Attinà: IT Support, Consulenza Informatica, Sviluppo Siti Web e Gestionali su misura. Operativo ad Adrano (Catania) e disponibile da remoto. Contattami per supporto IT, reti, sicurezza informatica o per realizzare il tuo sito web.',
                'keywords'    => 'IT support Adrano, consulenza informatica Catania, sviluppo siti web Sicilia, web developer Catania, gestionale personalizzato, IT specialist Sicilia, supporto informatico Adrano, cybersecurity Sicilia, Laravel developer, PHP developer Catania, assistenza informatica Catania, sito web professionale, Samuele Attinà',
                'url'         => 'https://samueleattina.it',
                'image'       => 'https://samueleattina.it/og-image.jpg',
            ],

            'about' => 'Sono un professionista IT a tutto tondo: lavoro attivamente come IT Support & ICT Specialist in azienda, gestendo infrastrutture, incident e sicurezza informatica, e parallelamente sviluppo siti web, applicazioni e gestionali su misura. Se hai bisogno di consulenza informatica, supporto tecnico, o vuoi un sito web / gestionale professionale, sono la persona giusta. Opero ad Adrano (CT) e da remoto su tutto il territorio.',

            'services' => [
                [
                    'icon'  => 'globe2',
                    'title' => 'Sviluppo Siti Web',
                    'desc'  => 'Realizzo siti web moderni, veloci e ottimizzati SEO. Dai siti vetrina ai portali complessi, con HTML, CSS, JavaScript, PHP e Laravel.',
                    'tags'  => ['Sito Vetrina', 'Landing Page', 'E-commerce', 'SEO'],
                    'color' => 'primary',
                ],
                [
                    'icon'  => 'window-stack',
                    'title' => 'Gestionali su Misura',
                    'desc'  => 'Sviluppo applicazioni web gestionali personalizzate per aziende: gestione magazzino, ordini, risorse umane, CRM e molto altro.',
                    'tags'  => ['CRM', 'ERP', 'Dashboard', 'Database'],
                    'color' => 'accent',
                ],
                [
                    'icon'  => 'headset',
                    'title' => 'Supporto IT & Consulenza',
                    'desc'  => 'Assistenza informatica professionale: installazione e configurazione sistemi, reti, VPN, firewall, Active Directory, Microsoft 365.',
                    'tags'  => ['Active Directory', 'Reti', 'Windows Server', 'Microsoft 365'],
                    'color' => 'accent2',
                ],
                [
                    'icon'  => 'graph-up-arrow',
                    'title' => 'Formazione & Crescita',
                    'desc'  => 'Mi sto preparando per le certificazioni Cisco CCNA e CompTIA Security+. A settembre inizierò la laurea in Informatica con magistrale in Sicurezza Informatica.',
                    'tags'  => ['CCNA', 'CompTIA Security+', 'Laurea Informatica'],
                    'color' => 'purple',
                ],
            ],

            'skills' => [
                ['category' => 'IT Service Management', 'items' => [
                    ['name' => 'Incident Management', 'level' => 90],
                    ['name' => 'ITIL Framework', 'level' => 80],
                    ['name' => 'Ticket Management', 'level' => 90],
                    ['name' => 'CMDB & Asset Management', 'level' => 75],
                ]],
                ['category' => 'Infrastructure & Network', 'items' => [
                    ['name' => 'Active Directory', 'level' => 85],
                    ['name' => 'VPN / Firewall / Switch Cisco', 'level' => 75],
                    ['name' => 'Windows Server', 'level' => 80],
                    ['name' => 'Endpoint Security', 'level' => 75],
                ]],
                ['category' => 'Web Development', 'items' => [
                    ['name' => 'HTML / CSS / JavaScript', 'level' => 80],
                    ['name' => 'PHP / Laravel', 'level' => 70],
                    ['name' => 'Bootstrap', 'level' => 85],
                    ['name' => 'MySQL / SQLite', 'level' => 70],
                ]],
                ['category' => 'Tools & Platform', 'items' => [
                    ['name' => 'Microsoft 365', 'level' => 90],
                    ['name' => 'GitHub', 'level' => 75],
                    ['name' => 'ERP Systems', 'level' => 70],
                ]],
            ],

            'experience' => [
                [
                    'role'        => 'IT Support & ICT Specialist Junior',
                    'company'     => 'Antichi Sapori dell\'Etna S.r.l.',
                    'period'      => 'Agosto 2025 – Presente',
                    'type'        => 'current',
                    'description' => 'Gestione degli incident IT di 1° e 2° livello. Qualificazione e prioritizzazione delle richieste tecniche. Coordinamento tra utenti business e fornitori IT esterni. Gestione account su Active Directory ed ERP. Configurazione sistemi Windows e infrastruttura di rete. Supporto VPN, switch e firewall. Monitoraggio sicurezza e progetti di miglioramento infrastruttura ICT.',
                    'tags'        => ['ITIL', 'Active Directory', 'Incident Management', 'VPN', 'Cisco', 'ERP'],
                ],
                [
                    'role'        => 'Capo Reparto – Linee Creme e Pesto',
                    'company'     => 'Antichi Sapori Dell\'Etna – Pisti',
                    'period'      => 'Ottobre 2022 – Novembre 2024',
                    'type'        => 'past',
                    'description' => 'Coordinamento operativo del team di reparto. Pianificazione attività e gestione delle priorità. Monitoraggio delle performance e rispetto degli SLA di produzione. Problem solving e risoluzione delle problematiche operative. Miglioramento continuo dei processi produttivi.',
                    'tags'        => ['Team Leadership', 'SLA', 'Problem Solving', 'Process Improvement'],
                ],
            ],

            'education' => [
                [
                    'title'       => 'Laurea in Informatica + Magistrale in Sicurezza Informatica',
                    'institution' => 'Università (in partenza)',
                    'period'      => 'Settembre 2025 – In corso',
                    'description' => 'A settembre inizio il percorso universitario in Informatica, con obiettivo magistrale in Sicurezza Informatica.',
                    'upcoming'    => true,
                ],
                [
                    'title'       => 'Full-Stack Web Developer con Specializzazione in Cybersecurity',
                    'institution' => 'Aulab',
                    'period'      => 'Novembre 2024 – Giugno 2025',
                    'description' => 'Corso intensivo di sviluppo web full-stack con focus su sicurezza informatica. HTML, CSS, JavaScript, PHP, Laravel, Bootstrap.',
                    'upcoming'    => false,
                ],
                [
                    'title'       => 'Diploma di Liceo delle Scienze Umane – Opzione Economico-Sociale',
                    'institution' => 'Liceo Ginnasio Statale "G. Verga", Adrano',
                    'period'      => 'Settembre 2017 – Luglio 2022',
                    'description' => 'Votazione: 76/100',
                    'upcoming'    => false,
                ],
            ],

            'certifications' => [
                ['name' => 'Introduction to Cybersecurity', 'issuer' => 'Cisco',             'icon' => 'shield-lock', 'upcoming' => false],
                ['name' => 'Networking Basics',              'issuer' => 'Cisco',             'icon' => 'diagram-3',  'upcoming' => false],
                ['name' => 'Introduction to IoT',            'issuer' => 'Cisco',             'icon' => 'cpu',        'upcoming' => false],
                ['name' => 'Fondamenti di Cybersecurity',    'issuer' => 'LinkedIn Learning', 'icon' => 'lock',       'upcoming' => false],
                ['name' => 'Cisco CCNA',                     'issuer' => 'Cisco',             'icon' => 'router',     'upcoming' => true],
                ['name' => 'CompTIA Security+',              'issuer' => 'CompTIA',           'icon' => 'shield-half', 'upcoming' => true],
            ],

            'languages' => [
                ['name' => 'Italiano', 'level' => 'Madrelingua',      'percent' => 100],
                ['name' => 'Inglese',  'level' => 'B1 – Tecnico IT',  'percent' => 60],
                ['name' => 'Francese', 'level' => 'A2/B1',            'percent' => 45],
            ],
        ];

        return view('portfolio.index', compact('data'));
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        \Log::info('Portfolio contact form', $request->only(['name', 'email', 'subject', 'message']));

        return response()->json([
            'success' => true,
            'message' => 'Messaggio ricevuto! Ti contatterò al più presto.',
        ]);
    }
}
