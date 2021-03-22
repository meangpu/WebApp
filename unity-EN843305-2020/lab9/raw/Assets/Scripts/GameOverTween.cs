using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using DG.Tweening;

public class GameOverTween : MonoBehaviour
{
    public Transform gameOverPanel;
    public Transform center;
    public Transform outPos;

    public void moveIn()
    {
        gameOverPanel.DOMoveY(center.position.y, 1);
    }

    public void moveOut()
    {
        gameOverPanel.DOMoveY(outPos.position.y, 1);
    }

}
