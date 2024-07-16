<?php

function getRandomElement($array) {
    return $array[array_rand($array)];
}

function sendRequest($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Content-Type: application/json',
    ));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

$url = 'http://127.0.0.1:8000/api/products';

$names = array(
    "John Smith", "Jane Doe", "Alice Johnson", "Bob Brown", "Charlie Davis", "David Miller",
    "Emma Wilson", "Frank Harris", "Grace Clark", "Hank Lewis", "Ivy Walker", "Jack Young",
    "Karen Hall", "Larry Allen", "Mary Wright", "Nancy Scott", "Oscar Hill", "Paul Green",
    "Queen Adams", "Roger Baker", "Susan Nelson", "Tom Carter", "Uma Mitchell", "Victor Perez",
    "Wendy Roberts", "Xander Turner", "Yara Phillips", "Zachary Campbell", "Ann Morgan",
    "Brian Reed", "Cindy Murphy", "Doug Bell", "Eve Cooper", "Fred Bailey", "Gina Rivera",
    "Henry Long", "Isla Howard", "Jake Ward", "Kyla Cox", "Leo Richardson", "Mia Kim",
    "Nick Hughes", "Olivia Price", "Pete Sanders", "Quinn Ross", "Raymond Foster",
    "Sophie Simmons", "Tim Griffin", "Ursula Torres", "Vince Patterson", "Will Jenkins",
    "Xenia Foster", "Yvonne Gray", "Zane Stephens", "Amber Bennett", "Bradley Morris",
    "Chloe Rogers", "Dylan Peterson", "Ella Henderson", "Finn Edwards", "Gabby Brooks",
    "Harold Butler", "Isabel James", "Jason Hughes", "Katie Barnes", "Liam Kelly",
    "Megan Reed", "Nolan Wood", "Olive Watson", "Perry Myers", "Quincy Bailey",
    "Riley Barnes", "Sara Mills", "Tina Diaz", "Ulysses Daniels", "Vera Howard",
    "Walter King", "Xander Lee", "Yasmin Turner", "Zoe Griffin", "Abigail Flores",
    "Blake Perry", "Charlotte Russell", "Dean Patterson", "Evelyn Bryant", "Felix Collins",
    "Gabriel Rodriguez", "Hannah Martin", "Ian Cooper", "Julia Jenkins", "Kyle Alexander",
    "Luna Cruz", "Mason Sanders", "Nina Lopez", "Owen Bryant", "Penelope Fisher", "Quinn Ward"
);

$authors = array(
    "Stephen King", "J.K. Rowling", "George R.R. Martin", "Agatha Christie", "J.R.R. Tolkien",
    "Isaac Asimov", "Arthur C. Clarke", "James Patterson", "Mark Twain", "Ernest Hemingway",
    "Jane Austen", "Charles Dickens", "F. Scott Fitzgerald", "William Shakespeare",
    "Leo Tolstoy", "H.G. Wells", "Virginia Woolf", "John Grisham", "Dan Brown",
    "C.S. Lewis", "Robert Louis Stevenson", "Michael Crichton", "E.L. James", "Harper Lee",
    "Suzanne Collins", "Kurt Vonnegut", "Roald Dahl", "George Orwell", "Ray Bradbury",
    "Margaret Atwood", "Ayn Rand", "Herman Melville", "J.D. Salinger", "Douglas Adams",
    "Terry Pratchett", "Toni Morrison", "Gabriel Garcia Marquez", "Orson Scott Card",
    "Philip K. Dick", "Neil Gaiman", "James Joyce", "Vladimir Nabokov", "Jules Verne",
    "Oscar Wilde", "Homer", "Fyodor Dostoevsky", "Edgar Allan Poe", "J.M. Barrie",
    "Victor Hugo", "Franz Kafka", "Marcel Proust", "Mary Shelley", "Bram Stoker",
    "Emily Bronte", "Anne Rice", "Jack London", "H.P. Lovecraft", "Lewis Carroll",
    "Thomas Hardy", "Joseph Conrad", "John Steinbeck", "Stephenie Meyer", "Rick Riordan",
    "P.G. Wodehouse", "Wilkie Collins", "Herman Hesse", "Charlotte Bronte", "D.H. Lawrence",
    "Ian Fleming", "Clive Barker", "Edith Wharton", "Alexandre Dumas", "Khaled Hosseini",
    "John Irving", "Ken Follett", "Aldous Huxley", "Jodi Picoult", "Michael Ondaatje",
    "John Updike", "Haruki Murakami", "Kazuo Ishiguro", "E.B. White", "Lois Lowry",
    "Anne Frank", "Sylvia Plath", "Erich Segal", "Nora Roberts", "Danielle Steel",
    "Anne Tyler", "Amy Tan", "Willa Cather", "Henry James", "L.M. Montgomery",
    "Kurt Vonnegut", "Nathaniel Hawthorne", "Zadie Smith", "Elizabeth Gilbert", "David Sedaris"
);

$categories = array(
    "Entertainment", "Finance", "Politics", "Self-help"
);

$synopses = array(
    "An intriguing tale of mystery and suspense.",
    "A fascinating journey through the world of fantasy.",
    "A detailed account of historical events.",
    "An informative guide on the latest in technology.",
    "An educational resource for science enthusiasts.",
    "A heartwarming story of love and friendship.",
    "A gripping thriller that will keep you on the edge of your seat.",
    "A thought-provoking exploration of philosophical ideas.",
    "A hilarious collection of anecdotes and humor.",
    "A poignant memoir of personal growth and resilience.",
    "An epic adventure across uncharted territories.",
    "A comprehensive analysis of economic trends.",
    "A deep dive into the psychology of human behavior.",
    "A captivating narrative of political intrigue.",
    "A chilling horror story that will haunt your dreams.",
    "An inspiring tale of overcoming adversity.",
    "A romantic saga set against a backdrop of war.",
    "A futuristic vision of dystopian society.",
    "A whimsical fairy tale for children and adults alike.",
    "A suspenseful whodunit with an unexpected twist.",
    "A guide to mastering new skills and hobbies.",
    "A chronicle of legendary heroes and mythical creatures.",
    "An insightful look into the complexities of relationships.",
    "A dramatic portrayal of family dynamics.",
    "A witty satire on contemporary culture.",
    "A tragic love story that spans generations.",
    "An exploration of ancient civilizations and their secrets.",
    "A powerful narrative of social justice and activism.",
    "A humorous take on everyday life situations.",
    "A rich tapestry of folklore and tradition.",
    "A scientific exploration of the universe and its mysteries.",
    "A collection of short stories with diverse themes.",
    "A psychological drama that delves into the human mind.",
    "A travelogue of exotic destinations around the world.",
    "A guide to achieving mental and physical well-being.",
    "A history of significant political movements.",
    "A behind-the-scenes look at the entertainment industry.",
    "A manual for business success and leadership.",
    "A recipe book with culinary delights from around the globe.",
    "A study of environmental issues and conservation efforts.",
    "A heart-pounding action thriller with non-stop excitement.",
    "A biographical account of a remarkable individual's life.",
    "A philosophical treatise on the nature of existence.",
    "A cultural analysis of artistic movements and their impact.",
    "A children's book filled with imagination and wonder.",
    "A detailed exploration of legal systems and justice.",
    "A poetic journey through the beauty of language.",
    "A mystical adventure in a world of magic and enchantment.",
    "A humorous critique of societal norms.",
    "A gritty crime novel set in the urban underworld.",
    "A tender romance set in a picturesque countryside.",
    "A historical epic that spans centuries and continents.",
    "A practical guide to home improvement and DIY projects.",
    "A fascinating biography of a pioneering figure.",
    "A romantic comedy with charming characters.",
    "A suspenseful tale of espionage and international intrigue.",
    "A heartwarming collection of holiday stories.",
    "A scientific examination of groundbreaking discoveries.",
    "A poignant exploration of loss and healing.",
    "A guide to navigating the complexities of modern life.",
    "A collection of essays on diverse topics and perspectives.",
    "A historical romance with a touch of fantasy.",
    "A motivational book on achieving personal goals.",
    "A suspense-filled detective novel with clever twists.",
    "A thrilling sci-fi adventure in a distant galaxy.",
    "A heartwarming story of animals and their adventures.",
    "A comprehensive guide to mastering a new craft.",
    "A poetic reflection on nature and the seasons.",
    "A humorous look at the quirks of human nature.",
    "A dramatic retelling of classic myths and legends.",
    "A guide to personal finance and investment strategies.",
    "A thrilling courtroom drama with unexpected revelations.",
    "A poignant coming-of-age story with relatable characters.",
    "A suspenseful police procedural with a gritty edge.",
    "A charming story of friendship and community.",
    "A comprehensive history of significant world events.",
    "A philosophical dialogue on ethics and morality.",
    "A heartwarming tale of family bonds and traditions.",
    "A thrilling adventure in a post-apocalyptic world.",
    "A witty and satirical commentary on modern society.",
    "A guide to achieving mindfulness and inner peace.",
    "A dramatic portrayal of political power struggles.",
    "A magical story of wishes and dreams coming true.",
    "A suspenseful paranormal thriller with a twist.",
    "A guide to cultivating a beautiful garden.",
    "A collection of humorous essays on everyday life.",
    "A heart-pounding adventure in an exotic locale.",
    "A romantic drama with a historical backdrop.",
    "A detailed analysis of cultural phenomena.",
    "A captivating fantasy with richly drawn characters."
);

for ($i = 0; $i < 1000; $i++) {
    $data = array(
        "name" => getRandomElement($names),
        "author" => getRandomElement($authors),
        "category" => getRandomElement($categories),
        "synopsis" => getRandomElement($synopses)
    );

    $response = sendRequest($url, $data);
    echo "Response for request $i: $response\n";
}

?>
