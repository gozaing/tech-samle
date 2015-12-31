public class Murata extends Player
{
    public Murata(String name)
    {
        super(name);
    }

    @Override
    public int showHand()
    {
        return STONE;
    }
}