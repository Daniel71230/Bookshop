<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Genre;
use \App\Models\Book;
use \App\Models\Review;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            
        $genre = Genre::create([
            'name' => 'History'
            ]);
        $genre = Genre::create([
            'name' => 'Novel'
            ]);
        $genre = Genre::create([
            'name' => 'Multi genre'
            ]);
        $genre = Genre::create([
            'name' => 'Crime & Detective'
            ]);
        $genre = Genre::where('name', 'History')->first();
        $genre->books()->create(['name' => 'Life in the Fallout of the Third Reich', 'author_name' => 'Harald Jahner',
        'description' => 'Germany, 1945: a country in ruins. Cities have been reduced to rubble and more than half of the population are where they do not belong or do not want to be. How can a functioning society ever emerge from this chaos? In bombed-out Berlin, Ruth Andreas-Friedrich, journalist and member of the Nazi resistance, warms herself by a makeshift stove and records in her diary how a frenzy of expectation and industriousness grips the city. The Americans send Hans Habe, an Austro-Hungarian Jewish journalist and US army soldier, to the frontline of psychological warfare - tasked with establishing a newspaper empire capable of remoulding the minds of the Germans. The philosopher Hannah Arendt returns to the country she fled to find a population gripped by a manic loquaciousness, but faces a deafening wall of silence at the mention of the Holocaust.',
        'price' => 8.50]);

        $genre->books()->create(['name' => 'The Winter Agent', 'author_name' => 'Gareth Rubin',
        'description' => "THE GRIPPING WWII ESPIONAGE THRILLER ABOUT SURVIVAL, TRUST AND A DEADLY BATTLE FOR THE TRUTH . . . 'Races along, with plenty of surprises' Times February, 1944. A bitter winter grips occupied France, where Marc Reece leads a circuit of British agents risking their lives in order to sabotage the German war effort from within. But Reece has a second mission, secret even from his fellow agents - including Charlotte, the woman with whom he has ill-advisedly fallen in love. He must secure a document identifying a German spy at the heart of British intelligence. The fate of the Allied forces on D-Day is in his hands. But when his circuit is ambushed - with fatal consequences - Reece realizes there may be a traitor in its ranks, putting everything they've been fighting for at risk. Then Charlotte goes missing. Is she in danger, or has Reece been betrayed by the only person he thought he could trust? And with the clock ticking towards D-Day, can he find the truth before it's too late? A gripping and atmospheric thriller inspired by true events, this is the story of a deadly game of espionage, destined to change the course of the most crucial battle in the Second World War. 'Exhaustively researched, superbly realised, The Winter Agent is a superior SOE novel. Gareth Rubin really knows his stuff and it shows on every page' Howard Linskey 'Smart, stylish, meticulously researched. Rich in loyalty and double dealing, captures perfectly the horror and heroism, delivered at a cracking pace' Sun 'Brilliant. Blends meticulously researched history with a plot of double-crossing and deception' Best",
        'price' => 10]);

        $book = new Book();
        $book->name = "The Brothers Karamazov";
        $book->author_name = "Fyodor Dostoevsky";
        $book->description = "The Brothers Karamasov is a murder mystery, a courtroom drama, and an exploration of erotic rivalry in a series of triangular love affairs involving the “wicked and sentimental” Fyodor Pavlovich Karamazov and his three sons―the impulsive and sensual Dmitri; the coldly rational Ivan; and the healthy, red-cheeked young novice Alyosha. Through the gripping events of their story, Dostoevsky portrays the whole of Russian life, is social and spiritual striving, in what was both the golden age and a tragic turning point in Russian culture.";
        $book->price = 15;
        $genre = Genre::where('name', 'Novel')->first();
        $genre->books()->save($book);

        $book = new Book();
        $book->name = "Fathers and Sons";
        $book->author_name = "Ivan Turgenev";
        $book->description = "Fathers and Sons, novel by Ivan Turgenev, published in 1862 as Ottsy i deti. Quite controversial at the time of its publication, Fathers and Sons concerns the inevitable conflict between generations and between the values of traditionalists and intellectuals.";
        $book->price = 10.90;
        $genre = Genre::where('name', 'Novel')->first();
        $genre->books()->save($book);   

        $book = new Book();
        $book->name = "Demons";
        $book->author_name = "Fyodor Dostoevsky";
        $book->description = "Inspired by the true story of a political murder that horried Russians in 1869, Fyodor Dostoevsky conceived of Demons as a 'novel-pamphlet' in which he would say everything about the plague of materialist ideology that he saw infecting his native land. What emerged was a prophetic and ferociously funny masterpiece of ideology and murder in pre-revolutionary Russia.";
        $book->price = 7.50;
        $genre = Genre::where('name', 'Novel')->first();
        $genre->books()->save($book);
        
        $book = new Book();
        $book->name = "Brave New World";
        $book->author_name = "Aldous Huxley";
        $book->description = "Aldous Huxley's profoundly important classic of world literature, Brave New World is a searching vision of an unequal, technologically-advanced future where humans are genetically bred, socially indoctrinated, and pharmaceutically anesthetized to passively uphold an authoritarian ruling order–all at the cost of our freedom, full humanity, and perhaps also our souls. “A genius [who] who spent his life decrying the onward march of the Machine” (The New Yorker), Huxley was a man of incomparable talents: equally an artist, a spiritual seeker, and one of history’s keenest observers of human nature and civilization. Brave New World, his masterpiece, has enthralled and terrified millions of readers, and retains its urgent relevance to this day as both a warning to be heeded as we head into tomorrow and as thought-provoking, satisfying work of literature. Written in the shadow of the rise of fascism during the 1930s, Brave New World likewise speaks to a 21st-century world dominated by mass-entertainment, technology, medicine and pharmaceuticals, the arts of persuasion, and the hidden influence of elites. ";
        $book->price = 13;
        $genre = Genre::where('name', 'Multi genre')->first();
        $genre->books()->save($book);

        $book = new Book();
        $book->name = "With Fire and Sword";
        $book->author_name = "Henryk Sienkiewicz";
        $book->description = "With Fire and Sword is a historical fiction novel, set in the 17th century in the Polish–Lithuanian Commonwealth during the Khmelnytsky Uprising. It gained enormous popularity in Poland, and by the turn of the 20th century had become one of the most popular Polish books ever.";
        $book->price = 20;
        $genre = Genre::where('name', 'History')->first();
        $genre->books()->save($book);

        $book = new Book();
        $book->name = "The Hound of the Baskervilles";
        $book->author_name = "Sir Arthur Conan Doyle";
        $book->description = "One of the BBC's '100 Novels That Shaped Our World' The Hound of the Baskervilles gripped readers when it was first serialised and remains one of Sherlock Holmes's greatest and most popular adventures. Could the sudden death of Sir Charles Baskerville have been caused by the gigantic ghostly hound that is said to have haunted his family for generations? Arch-rationalist Sherlock Holmes characteristically dismisses the theory as nonsense. And, immersed in another case, he sends Dr Watson to Devon to protect the Baskerville heir and observe the suspects at close hand. With its atmospheric setting on the ancient, wild moorland and its savage apparition, The Hound of the Baskervilles is one of the greatest crime novels ever written. Rationalism is pitted against the supernatural and good against evil as Sherlock Holmes sets out to defeat a foe almost his equal. This edition contains a full chronology of Arthur Conan Doyle's life and works, an introduction by renowned horror scholar Professor Christopher Frayling discussing the background to the novel and the legends and events that inspired the story, with further reading and explanatory notes. 'Arthur Conan Doyle is unique ... Personally, I would walk a mile in tight boots to read him to the milkman' Stephen Fry";
        $book->price = 12.78;
        $genre = Genre::where('name', 'Crime & Detective')->first();
        $genre->books()->save($book);
                
        $book = new Book();
        $book->name = "20th Victim: Three cities.";
        $book->author_name = "James Patterson";
        $book->description = "The Women's Murder Club face the fight of their lives in this bestselling instalment in the James Patterson series THREE CITIES. THREE BULLETS. THREE VICTIMS. Simultaneous murders hit LA, Chicago and San Francisco. SFPD Sergeant Lindsay Boxer is tasked with uncovering what links these precise and calculated killings. Lindsay discovers that the victims all excel in lucrative, criminal activity. As the casualty list expands, fear and fascination with this shocking spree provoke debate across the country. Are the killers villains or heroes? And who will be next? __________________________________ PRAISE FOR THE WOMEN'S MURDER CLUB THRILLERS 'Smart characters, shocking twists . . . you count down to the very last page to discover what will happen next.' Lisa Gardner 'Packed with action . . . a compelling read with great set pieces and, most of all, that charismatic cast of characters.' Sun 'I couldn't turn the pages quick enough. Great plot, fantastic storytelling and characters that spring off the page - all the right ingredients for a thriller!' Heidi Perks 'Fast-moving, intricately plotted . . . Boxer steals the show as the tough cop with a good heart.' Mirror 'Terrific, high-octane, really pacy . . . every scene is a film, every character real and every plot point leaves us breathless.' Jo Spain";
        $book->price = 10.50;
        $genre = Genre::where('name', 'Crime & Detective')->first();
        $genre->books()->save($book);
        
        $book = new Book();
        $book->name = "11/22/63";
        $book->author_name = "Stephen King";
        $book->description = "On November 22, 1963, three shots rang out in Dallas, President Kennedy died, and the world changed. What if you could change it back? Stephen King’s heart-stoppingly dramatic new novel is about a man who travels back in time to prevent the JFK assassination—a thousand page tour de force. Following his massively successful novel Under the Dome, King sweeps readers back in time to another moment—a real life moment—when everything went wrong: the JFK assassination. And he introduces readers to a character who has the power to change the course of history. Jake Epping is a thirty-five-year-old high school English teacher in Lisbon Falls, Maine, who makes extra money teaching adults in the GED program. He receives an essay from one of the students—a gruesome, harrowing first person story about the night 50 years ago when Harry Dunning’s father came home and killed his mother, his sister, and his brother with a hammer. Harry escaped with a smashed leg, as evidenced by his crooked walk. Not much later, Jake’s friend Al, who runs the local diner, divulges a secret: his storeroom is a portal to 1958. He enlists Jake on an insane—and insanely possible—mission to try to prevent the Kennedy assassination. So begins Jake’s new life as George Amberson and his new world of Elvis and JFK, of big American cars and sock hops, of a troubled loner named Lee Harvey Oswald and a beautiful high school librarian named Sadie Dunhill, who becomes the love of Jake’s life—a life that transgresses all the normal rules of time.";
        $book->price = 14;
        $genre = Genre::where('name', 'Multi genre')->first();
        $genre->books()->save($book);

        $user = User::create([
            'name'=>'Jānis',
            'email'=>'test@gmail.com',
            'password'=> Hash::make('aaa'),   
            'role'=>'admin'
            ]);
        $book = Book::where('id', 1)->first();
        $review = new Review();
        $review->user_id=1;
        $review->username=$user->name;
        $review->text='Good book';
        $book->reviews()->save($review);     

        
        $user = User::create([
            'name'=>'Kārlis',
            'email'=>'test2@gmail.com',
            'password'=> Hash::make('aaa'),   
            'role'=>'user'
            ]);

        $book = Book::where('id', 5)->first();
        $review = new Review();
        $review->user_id=2;
        $review->username=$user->name;
        $review->text="Demons was more difficult to follow than Dostoevsky's other works. There are numerous characters that make minor appearances that come and go in the first half of the novel. Once you get the characters straightened out, the novel becomes engrossing. Dostoevsky is a master of plot structure and characterization. The intricacy and unfolding of the plot are well worth the time it takes to organize who's who. The main character, Stavrogin, presents a mysterious influence over the other characters and throughout the novel. Pyotr Stepanovich is the most relatable to today because of his overt hatred and nihilism. Dostoevsky's prescience and understanding of evil are unparalleled when comparing his stories to the actual history that occurred after his time.";
        $book->reviews()->save($review);
    }   
}
