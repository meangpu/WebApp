using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using DG.Tweening;

public class Tweening : MonoBehaviour
{
    public Transform myNameAnimation;
    public Transform LabText;
    public float NameAnimDurration;
    public float LabAnimDurration;
    public Vector3 LabScale;
    public Ease NameAnimEase;
    public Ease LabAnimEase;

    void Start()
    {
        myNameAnimation
            .DOMoveY(0, NameAnimDurration)
            .SetEase(NameAnimEase)
            .SetLoops(-1, LoopType.Yoyo);

        LabText
            .DOScale(LabScale, LabAnimDurration)
            .SetEase(LabAnimEase)
            .SetLoops(-1, LoopType.Yoyo);

    }

  
}
