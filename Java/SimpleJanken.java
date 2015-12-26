public class SimpleJanken
{

    public static final int STONE = 0;
    public static final int SCISSORS = 1;
    public static final int PAPER = 2;

    // ジャンケンの手を表す
    public static void main(String[] args)
    {
        int player1WinCount = 0;
        int player2WinCount = 0;
        int player1Hand     = 0;
        int player2Hand     = 0;

        double randomNum = 0;

        System.out.println("【ジャンケン開始】\n");

        for (int cnt = 0; cnt < 3; cnt++)
        {
            System.out.println("【" + (cnt +1) + "回目");

            randomNum = Math.random() * 3;

            if (randomNum < 1)
            {
                player1Hand = STONE;
                System.out.println("ぐー");
            }
            else if (randomNum < 2)
            {
                player1Hand = SCISSORS;
                System.out.println("チョキ");
            }
            else if(randomNum<3)
            {
                player1Hand = PAPER;
                System.out.println("パー");
            }

            System.out.print(" vs. ");

            randomNum = Math.random() * 3;

            if (randomNum < 1)
            {
                player2Hand = STONE;
                System.out.println("ぐー");
            }
            else if (randomNum < 2)
            {
                player2Hand = SCISSORS;
                System.out.println("チョキ");
            }
            else if(randomNum < 3)
            {
                player2Hand = PAPER;
                System.out.println("パー");
            }

            if ( (player1Hand == STONE && player2Hand == SCISSORS)
                    || (player1Hand == SCISSORS && player2Hand == PAPER)
                    || (player1Hand == PAPER && player2Hand == STONE))
            {
                System.out.println("\nプレイヤー１が勝ちました\n");
                player1WinCount++;
            }
            else if( (player1Hand == STONE && player2Hand == PAPER)
                    || (player1Hand == SCISSORS && player2Hand == STONE)
                    || (player1Hand == PAPER && player2Hand == SCISSORS))
            {
                System.out.println("\nプレイヤー２が勝ちました\n");
                player2WinCount++;
            }
            else
            {
                System.out.println("\n引き分けです\n");
            }

        }

        System.out.println("【ジャンケン終了】\n");

        if (player1WinCount > player2WinCount)
        {
            System.out.println(player1WinCount + "対" + player2WinCount + "でプレイヤー１の勝ちです\n");
        }
        else if(player1WinCount < player2WinCount)
        {
            System.out.println(player1WinCount + "対" + player2WinCount + "でプレイヤー２の勝ちです\n");
        }
        else
        {
            System.out.println(player1WinCount + "対" + player2WinCount + "で引き分けです\n");
        }

    }
}