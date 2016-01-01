public class Judge
{
    public void startJanken(Player player1, Player player2)
    {
        System.out.println("【ジャンケン開始】\n");

        for (int cnt = 0; cnt < 3; cnt++)
        {
            System.out.println("【" + (cnt+1) + "回戦目");

            Player winner = judgeJanken(player1,player2);

            if (winner != null)
            {
                System.out.println("\n" + winner.getName() + "が勝ちました１\n");
                winner.notifyResult(true);

            } else {
                System.out.println("\n引き分けです\n");
            }
        }

        System.out.println("【ジャンケン終了】\n");

        Player finalWinner = judgeFinalWinner(player1,player2);

        System.out.println(player1.getWinCount() + " 対 " + player2.getWinCount() + "で");

        if (finalWinner != null)
        {
            System.out.println(finalWinner.getName() + "の勝ちです\n");
        }
        else
        {
            System.out.println("引き分けです\n");
        }
    }

    private Player judgeJanken(Player player1, Player player2)
    {
        Player winner = null;

        int player1hand = player1.showHand();
        int player2hand = player2.showHand();

        printHand(player1hand);
        System.out.println(" vs. ");
        printHand(player2hand);
        System.out.println("\n");

        if ( (player1hand == Player.STONE && player2hand == Player.SCISSORS)
                || (player1hand == Player.SCISSORS && player2hand == Player.PAPER)
                || (player1hand == Player.PAPER && player2hand == Player.STONE))
        {
            winner = player1;
        }
        else if ((player1hand == Player.STONE && player2hand == Player.PAPER)
                || (player1hand == Player.SCISSORS && player2hand == Player.STONE)
                || (player1hand == Player.PAPER && player2hand == Player.SCISSORS))
        {
            winner = player2;
        }

        return winner;

    }

    private Player judgeFinalWinner(Player player1, Player player2)
    {
        Player winner = null;

        int player1WinCount = player1.getWinCount();
        int player2WinCount = player2.getWinCount();

        if (player1WinCount > player2WinCount)
        {
            winner = player1;
        }
        else if (player1WinCount < player2WinCount)
        {
            winner = player2;
        }

        return winner;

    }

    private void printHand(int hand)
    {
        switch (hand)
        {
            case Player.STONE :
                System.out.print("ぐー");
                break;
            case Player.SCISSORS :
                System.out.print("チョキ");
                break;
            case Player.PAPER :
                System.out.print("パー");
                break;
            default :
                break;
        }

    }
}