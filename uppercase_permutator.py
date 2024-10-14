def generate_all_capitalizations(word):
    """Generate all possible capitalization combinations for a word."""
    word = word.lower()
    capitalized_words = []
    
    for i in range(len(word)):
        capitalized_word = word[:i] + word[i].upper() + word[i+1:]
        capitalized_words.append(capitalized_word)
    
    return capitalized_words

def process_wordlist(input_file, output_file):
    """Process the wordlist and generate all capitalization combinations for each word."""
    with open(input_file, 'r') as f:
        words = f.readlines()

    with open(output_file, 'w') as out_file:
        for word in words:
            word = word.strip()  # Remove any trailing whitespace or newline
            # No length check, process all words
            capitalized_combinations = generate_all_capitalizations(word)
            for capitalized_word in capitalized_combinations:
                out_file.write(capitalized_word + '\n')

# Usage
input_wordlist = '/usr/share/john/filtered_password.lst'  # Path to the original password list
output_wordlist = 'processed_password.lst'  # Path to save the processed list

process_wordlist(input_wordlist, output_wordlist)

print(f"Processed wordlist with all combinations saved to {output_wordlist}")