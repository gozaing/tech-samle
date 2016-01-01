public class Player
{
    public static final int STONE = 0;
    public static final int SCISSORS = 1;
    public static final int PAPER = 2;

    private String name_;
    private int winCount_ = 0;
    private Tactics tactics_;

    public Player(String name)
    {
        name_ = name;
    }

    public int showHand()
    {
        int hand = tactics_.readTactics();

        return hand;
    }

    public void notifyResult(boolean result)
    {

        if (result == true)
        {
            winCount_ +=1;
        }

    }

    public int getWinCount()
    {
        return winCount_;
    }

    public String getName()
    {
        return name_;
    }
    void setTactics(Tactics tactics)
    {
        tactics_ = tactics;
    }
}