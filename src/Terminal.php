<?php

namespace Parser;

class Terminal
{
    /**
     * Command input and division in array
     */
    public function input()
    {
        echo "\n\033[36m> \033[0m";
        $input = trim(fgets(STDIN));
        $split_input =  preg_split("/[\s,]+/", $input);

        $this->select($split_input);
    }

    /**
     * Executing command
     */
    private function select($command)
    {
        if ($command[0] == "parse")
        {
            echo "parse \n";
            $this->input();
        }
        elseif ($command[0] == "report")
        {
            echo "report \n";
            $this->input();
        }
        elseif ($command[0] == "help")
        {
            $help = $this->help();
            foreach ($help as $instruction)
            {
                echo $instruction."\n";
            }
            $this->input();
        }
        elseif ($command[0] == "exit")
        {
            $this->exit();
        }
        else
        {
            echo "\033[31mIncorrect command. For additional info enter \"help\" \033[0m \n";
            $this->input();
        }
    }

    private function help()
    {
        $commands = [
            'help (information about commands)',
            'parse -url (parse preassigned url)',
            'report -domain (get report by the domain)',
            'exit (leave the program)'
        ];

        return $commands;
    }

    /**
     * Exit proposal
     */
    private function exit()
    {
        echo "\033[36mDo you really want to exit? (\"y/n\")? \033[0m";
        $decision =  trim(fgets(STDIN));
        if ($decision == 'n'){
            $this->input();
        }
        elseif ($decision == 'y'){
            die('bye'."\xA");
        }
        else{
            echo "\xA";
            $this->exit();
        }
    }
}