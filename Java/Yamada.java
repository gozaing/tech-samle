public class Yamada extends Player
{
    public Yamada(String name)
    {
        super(name);
    }

    @Override
    public int showHand()
    {
        return PAPER;
    }
}